document.addEventListener('DOMContentLoaded', function() {
    // Récupérez la liste de thèmes avec leurs liens CDN
    var themeLinks = {
        classic: 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',
        sketchy: 'https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/sketchy/bootstrap.min.css',
        litera : 'https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/litera/bootstrap.min.css',
        pulse : 'https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/pulse/bootstrap.min.css',
        spacelab : 'https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/spacelab/bootstrap.min.css',
        morph : 'https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/morph/bootstrap.min.css',
    };

    // Récupérez l'élément de liste où les éléments seront générés
    var themeDropdown = document.getElementById('themeDropdown');

    // Définissez le thème par défaut
    var defaultTheme = localStorage.getItem('theme') || 'classic';
    

    // Parcourez les thèmes et créez les éléments de liste dynamiquement
    for (var theme in themeLinks) {
        if (themeLinks.hasOwnProperty(theme)) {
            var listItem = document.createElement('li');
            var link = document.createElement('a');
            link.className = 'dropdown-item';
            link.href = '#';
            link.setAttribute('data-theme', theme);
            link.textContent = theme ;

            // Ajoutez un écouteur d'événements pour chaque élément de liste
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var selectedTheme = this.getAttribute('data-theme');
                var linkElement = document.getElementById('cdnLink');
                
                if (themeLinks[selectedTheme]) {
                    linkElement.href = themeLinks[selectedTheme];
                }
                link.linkElement += ' active';

                // Enregistrez le thème sélectionné dans le stockage local
                localStorage.setItem('theme', selectedTheme);
            });

            listItem.appendChild(link);
            themeDropdown.appendChild(listItem);

            // Si le thème est le thème par défaut, mettez à jour le lien CDN par défaut
            if (theme === defaultTheme) {
                var linkElement = document.getElementById('cdnLink');
                linkElement.href = themeLinks[defaultTheme];
            }
        }
    }
});
