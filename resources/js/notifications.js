Echo.private('App.Models.User.' + 1)
    .notification((notification) => {
        console.log(notification);
        let notificationButton = document.getElementById('notificationButton');
        let notificationInnerDiv = document.getElementById('notificationInnerDiv');
        let notificationIconDiv = document.getElementById('notificationIconDiv');
        let notificationTextDiv = document.getElementById('notificationTextDiv');
        let notificationText = notificationTextDiv.querySelector('p');
        let href = notificationButton.href;
        notificationButton.href = notification.href;
        notificationButton.classList.add('dark:bg-dm-aquamarine', 'dark:hover:bg-dm-dark_green-700', 'bg-sea_green', 'hover:bg-mint_green-300');
        notificationButton.classList.remove('dark:bg-dm-dark_green', 'dark:hover:bg-dm-dark_green', 'bg-mint_green', 'hover:bg-mint_green');
        notificationIconDiv.classList.add('top-10');
        let notificationStep2 = setTimeout(() => {
            notificationInnerDiv.classList.add('w-72');
            notificationInnerDiv.classList.remove('w-6');
            clearTimeout(notificationStep2);
            let notificationStep3 = setTimeout(() => {
                notificationText.innerText = notification.title;
                notificationTextDiv.style.width = 'inherit';
                notificationTextDiv.classList.remove('hidden');
                notificationTextDiv.classList.add('top-0');
                notificationTextDiv.classList.remove('top-8');
                clearTimeout(notificationStep3);
                let notificationStep4 = setTimeout(() => {
                    notificationTextDiv.classList.add('top-8');
                    notificationTextDiv.classList.remove('top-0');
                    clearTimeout(notificationStep4);
                    let notificationStep5 = setTimeout(() => {
                        notificationTextDiv.classList.add('hidden');
                        notificationTextDiv.style.width = 'auto';
                        notificationInnerDiv.classList.add('w-6');
                        notificationInnerDiv.classList.remove('w-72');
                        clearTimeout(notificationStep5);
                        let notificationStep6 = setTimeout(() => {
                            notificationIconDiv.classList.remove('top-10');
                            notificationButton.classList.add('dark:bg-dm-dark_green', 'dark:hover:bg-dm-dark_green', 'bg-mint_green', 'hover:bg-mint_green');
                            notificationButton.classList.remove('dark:bg-dm-aquamarine', 'dark:hover:bg-dm-dark_green-700', 'bg-sea_green', 'hover:bg-mint_green-300');
                            notificationButton.href = href;
                            clearTimeout(notificationStep6);
                        }, 500);
                    }, 150);
                }, 5000)
            }, 150);
        }, 500);
    });
