<script>
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Csrf Token.

    // --------------------------------------------------
    // Prize carousel.
    // --------------------------------------------------
    let prizeCarousel = document.getElementById('prizeCarousel');

    const movePrizeCarousel = () => {

        let currentRight = 0;
        let maxRight = 290;

        let move = setInterval(() => {
            moveToRight()
        }, 10);

        setInterval(() => {
            if (currentRight == maxRight) {
                clearInterval(move);
                let prize = prizeCarousel.children;
                let firstPrize = prize[0];
                prize[0].remove();
                prizeCarousel.appendChild(firstPrize);
                prizeCarousel.style.right = 0;
                currentRight = 0;

                move = setInterval(() => {
                    moveToRight()
                }, 10);
            }
        }, 10);

        const moveToRight = () => {
            currentRight++;
            prizeCarousel.style.right = `${currentRight}px`;
        }
    }

    movePrizeCarousel();

    // --------------------------------------------------
    // Check selected month.
    // --------------------------------------------------
    const checkSelectedMonth = () => {
        // Get input values.
        let inputValues = {
            _token: token,
            month: document.getElementById('month').value
        }

        let data = JSON.stringify(inputValues);

        // Ajax set winning prize.
        const url = `${window.location.protocol}//${window.location.hostname}/dashboard/post/check-selected-month`;

        let xhr = new XMLHttpRequest()
        xhr.open('POST', url, true)
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.send(data);
        
        xhr.onload = function () {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                selectedMonthStatus = response['selectedMonthStatus'];
                
                if (selectedMonthStatus) {
                    triggerGrandPrizeWinner();
                }else {
                    triggerErrorText();
                }
            }
        }
    }

    // --------------------------------------------------
    // Get grand prize winner.
    // --------------------------------------------------
    const triggerGrandPrizeWinner = () => {// Get input values.
        let inputValues = {
            _token: token,
            month: document.getElementById('month').value
        }

        let data = JSON.stringify(inputValues);

        // Ajax set winning prize.
        const url = `${window.location.protocol}//${window.location.hostname}/dashboard/post/set-grand-prize-winner`;

        let xhr = new XMLHttpRequest()
        xhr.open('POST', url, true)
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.send(data);
        
        xhr.onload = function () {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                let eligibleNames = response['eligibleNames'];
                let winnerName = response['winnerName'];
                let message = response['message'];
                
                let grandPrizeModal = document.getElementById("grandPrizeModal");
                grandPrizeModal.classList.remove('hidden');

                let modalWinMessage = document.getElementById("modalWinMessage");
                let modalWinner = document.getElementById("modalWinner");
                let viewGrandPrizeWInner = document.getElementById("viewGrandPrizeWInner");

                let count = 0
                let randomized = setInterval(() => {
                    modalWinner.innerHTML = eligibleNames[count];
                    count++;
                    if (count == eligibleNames.length - 1) count = 0;
                }, 50);
                
                setTimeout(() => {

                    let grandPrizeModalBackdrop = document.getElementById("grandPrizeModalBackdrop");
                    let grandPrizeModalClose = document.getElementById("grandPrizeModalClose");

                    grandPrizeModalBackdrop.setAttribute('onclick', 'closeGrandPrizeModal()');
                    grandPrizeModalClose.setAttribute('onclick', 'closeGrandPrizeModal()');
                    
                    modalWinMessage.innerHTML = message;
                    modalWinner.innerHTML = winnerName;
                    viewGrandPrizeWInner.classList.remove('hidden');
                    viewGrandPrizeWInner.classList.add('flex');
                    clearInterval(randomized);
                }, 2500);
            }
        }
    }

    // --------------------------------------------------
    // Get text error.
    // --------------------------------------------------
    const triggerErrorText = () => {
        let errorMessage = document.getElementById("errorMessage");
        // Ajax get error text.
        const url = `${window.location.protocol}//${window.location.hostname}/dashboard/get/message/error`;

        let xhr = new XMLHttpRequest()
        xhr.open('GET', url, true)
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.send();
        
        xhr.onload = function () {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                errorMessage.innerHTML = response['errorMessage'];
            }
        }
    }

    // --------------------------------------------------
    // Close grand prize modal.
    // --------------------------------------------------
    const closeGrandPrizeModal = () => {
        let grandPrizeModal = document.getElementById("grandPrizeModal");
        grandPrizeModal.classList.add('hidden');
        grandPrizeModal.classList.remove('flex');
    }
</script>