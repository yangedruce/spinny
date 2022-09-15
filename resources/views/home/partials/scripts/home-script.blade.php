<script>
    let wheel = null; // Wheel.
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Csrf Token.

    window.onload = () => {
        drawWheel();
    }

    // --------------------------------------------------
    // Draw wheel.
    // --------------------------------------------------
    const drawWheel = () => {
        const url = `${window.location.protocol}//${window.location.hostname}/get/prize`;
        
        let xhr = new XMLHttpRequest();
        xhr.open('GET', url, true)
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.send();

        xhr.onload = function () {
            if (xhr.status === 200) {
                let prize = JSON.parse(xhr.responseText);
                let segments = []

                // Set wheel contents.
                for (let i = 0; i < prize.length; i++) {
                    segments.push({
                        'textFontSize': 12,
                        'text': prize[i]['name']
                    });
                }

                wheel = new Winwheel({
                    'canvasId' : 'wheel',
                    'numSegments' : prize.length,
                    'segments' : segments,
                    'fillStyle' : '#fecdd3',
                    'lineWidth' : 1,
                    'animation' :
                    {
                        'type'     : 'spinToStop',
                        'duration' : 5,    
                        'spins'    : 3,     
                        'callbackFinished' : showPrizeModal,
                        'callbackSound'    : playSound,   
                        'soundTrigger'     : 'pin'        
                    },
                    'pins' :				
                    {
                        'number'     : prize.length,
                        'fillStyle'  : 'silver',
                        'outerRadius': 4,
                    }
                });

                checkSpinnerStatus();
            }
        }
    } 

    // --------------------------------------------------
    // Check spinner status.
    // --------------------------------------------------
    const checkSpinnerStatus = () => {
        let spinnerStatus = false;
        // Ajax get current prize winner.
        const url = `${window.location.protocol}//${window.location.hostname}/get/spinner`;
        
        let xhr = new XMLHttpRequest()
        xhr.open('GET', url, true)
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.send();
        
        xhr.onload = function () {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                spinnerStatus = response['spinnerStatus'];
                prizeIndex = response['prizeIndex'];

                if (spinnerStatus && prizeIndex != null) {
                    stopAt = wheel.getRandomForSegment(prizeIndex);
                    wheel.animation.stopAngle = stopAt;
                    wheel.animation.duration = 0;
                    triggerWheelSpin();
                }
            }
        }
    }

    // --------------------------------------------------
    // Form submission.
    // --------------------------------------------------
    let form = document.getElementById('spinForm');

    if (form != null) {
        form.onsubmit = e => {
            // Prevent from submitting form.
            e.preventDefault();

            postForm();
        }
    }
    
    // --------------------------------------------------
    // Check credential validity.
    // --------------------------------------------------
    const postForm = () => {
        let spinnerStatus = false;

        // Get input values.
        let inputValues = {
            _token: token,
            email: document.getElementById('email').value,
            code: document.getElementById('code').value,
        }

        let data = JSON.stringify(inputValues);

        // Ajax set winning prize.
        const url = `${window.location.protocol}//${window.location.hostname}/post/form`;

        let xhr = new XMLHttpRequest()
        xhr.open('POST', url, true)
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.send(data);
        
        xhr.onload = function () {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                spinnerStatus = response['spinnerStatus'];
                prizeIndex = response['prizeIndex'];
                
                if (spinnerStatus && prizeIndex != null) {
                    stopAt = wheel.getRandomForSegment(prizeIndex);
                    wheel.animation.stopAngle = stopAt;
                    triggerWheelSpin();
                }else {
                    triggerErrorText();
                }
            }
        }
    }

    // --------------------------------------------------
    // Trigger wheel spin.
    // --------------------------------------------------
    const triggerWheelSpin = () => {
        
        // Scroll to wheel if wheel is not in view.
        if (window.scrollY < document.getElementById('wheel').getBoundingClientRect().top) document.getElementById('wheel').scrollIntoView(); 

        // Set Spin the Wheel button unclickable.
        let spinFormButton = document.getElementById('spinFormButton');
        spinFormButton.style.pointerEvents = 'none';

        // Set all inputs unclicakble
        let inputs = form.querySelectorAll('input')
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].style.pointerEvents = 'none';
        }

        wheel.startAnimation();
    }

    // --------------------------------------------------
    // Trigger error text.
    // --------------------------------------------------
    const triggerErrorText = () => {
        let formErrorMessage = document.getElementById("formErrorMessage");
        // Ajax get error text.
        const url = `${window.location.protocol}//${window.location.hostname}/get/message/error`;

        let xhr = new XMLHttpRequest()
        xhr.open('GET', url, true)
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.send();
        
        xhr.onload = function () {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                formErrorMessage.innerHTML = response['errorMessage'];
            }
        }
    }

    // --------------------------------------------------
    // Show prize modal.
    // --------------------------------------------------
    const showPrizeModal = () => {
        let prizeModal = document.getElementById("prizeModal");
        let modalWinMessage = document.getElementById("modalWinMessage");
        // Ajax get winning prize.
        const url = `${window.location.protocol}//${window.location.hostname}/get/message/win`;
        
        let xhr = new XMLHttpRequest()
        xhr.open('GET', url, true)
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.send();
        
        xhr.onload = function () {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                prizeModal.classList.remove('hidden');
                modalWinMessage.innerHTML = response['winMessage'];
            }
        }
    }

    // --------------------------------------------------
    // Tick sound.
    // --------------------------------------------------
    let audio = new Audio('audio/tick.mp3');
    
    // This function is called when the sound is to be played.
    const playSound = () => {
        
        // Stop and rewind the sound if it already happens to be playing.
        audio.pause();
        audio.currentTime = 0;
        
        // Play the sound.
        audio.play();
    }

    // --------------------------------------------------
    // Share Facebook.
    // --------------------------------------------------
    const shareFacebook = e => {
        e.preventDefault();

        updatePrizeWinner();

        let url = `https://facebook.com/sharer.php?u=${window.location.href}`
        window.open(url,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250');
    }

    // --------------------------------------------------
    // Update current prize winner share.
    // --------------------------------------------------
    const updatePrizeWinner = () => {
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
        // Get input values.
        let inputValues = {
            _token: token,
        }
        
        let data = JSON.stringify(inputValues);
        
        // AJAX to set prize winner sharing
        const url = `${window.location.protocol}//${window.location.hostname}/post/currentPrizeWinner`;
        let xhr = new XMLHttpRequest()
        
        xhr.open('POST', url, true)

        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.send(data);

        // xhr.onload = function () {
        //     if (xhr.status === 200) {
        //         let response = JSON.parse(xhr.responseText);
        //     }
        // }
    }
</script>