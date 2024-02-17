    document.addEventListener('DOMContentLoaded', function() {
        const progressCircle = document.querySelector('.progress-circle');
        const percentageSpan = progressCircle.querySelector('.percentage');
        const percentage = progressCircle.getAttribute('data-percentage');

        // Calculez l'angle de rotation en fonction du pourcentage
        const rotation = percentage * 3.6;
        if (rotation > 180) {
            progressCircle.classList.add('over-50');
        }

        // Appliquez la rotation
        progressCircle.style.setProperty('--rotation', rotation + 'deg');

        // Mettez à jour le texte du pourcentage
        percentageSpan.textContent = '+' + percentage + '%';

        // Animation CSS ajustée via JavaScript
        document.styleSheets[0].addRule('.progress-circle::after', 'transform: rotate(' + rotation + 'deg)');
    });
