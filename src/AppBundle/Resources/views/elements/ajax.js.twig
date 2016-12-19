{# ajax.js Twig template #}
<script>
// Variables Globales de DOM
    var eventsEl = document.getElementById('events');

// Evenements sur les séletions

    window.addEventListener('load', function () {
        var callback = function (xhr) {
            var html = xhr.responseText;
            eventsEl.innerHTML = html;
        };
        ajax.connect('{{ path('apiEvents') }}', callback);
    });



// Fonctions de mise à jour des élements
    var ajax = {

        // Remplaer une variable twig
        varReplace: function (url, name, value) {

            return url.replace(name, value);
        },
        // Connection à l'API par des requète AJAX
        connect: function (url, callback) {

            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onload = function (e) {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        (callback)(xhr);
                    } else {
                        console.error(xhr.statusText);
                    }
                }
            };
            xhr.onerror = function (e) {
                console.error(xhr.statusText);
            };
            xhr.send(null);
        }

    };
</script>
