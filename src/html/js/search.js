var Search = function ()
{
    // console.log("new Search()");

    var self = this;

    self.searchInput = document.getElementById("search-input");
    self.searchResults = document.getElementById("search-results");
    self.debounceTimeout = null;

    self.displayResults = function(data) {
        self.searchResults.innerHTML = '';

        if (data && data.length > 0) {
            data.forEach(item => {
                var resultItem = document.createElement('div');
                resultItem.innerHTML = `
                    <div class="one-doctor" data-doctor-id="${item.id}">
                        <div><strong>${item.name}</strong></div>
                        <div class="specialty">${item.specialty}</div>
                        <div class="clinics">
                            ${item.clinics.map(clinic => `<div>${clinic.name}</div>`).join('')}
                        </div>
                    </div>
                `;

                self.searchResults.appendChild(resultItem);
            });
        }
        else {
            self.searchResults.innerHTML = 'No results found.';
        }
    };

    self.search = function() {
        var query = self.searchInput.value;

        clearTimeout(self.debounceTimeout);

        self.debounceTimeout = setTimeout(function() {
            var url = "/search?logged";

            if (query.length > 0) {
                url += "&name=" + encodeURIComponent(query);
            }

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    self.displayResults(data);
                })
                .catch(error => {
                    console.error('Error fetching search results:', error);
                });
        }, 400);
    };

    self.init = function()
    {
        self.searchInput.addEventListener('input', self.search);
    };

    self.init();
};

new Search();