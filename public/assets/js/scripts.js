/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 


// sidebar
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


// datatable
window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});


// cof dropdown
document.addEventListener('DOMContentLoaded', () => {
    const selectDrop = document.getElementById('cof');

    fetch('https://restcountries.com/v3.1/all')
    .then(function(res) {return res.json();})
    .then(function(cof)
        {
            // Extract country names
            const countryNames = cof.map(country => country.name.common);

            // Sort country names alphabetically
            countryNames.sort();

            let output = "";
            countryNames.forEach(countryName => {
                console.log(countryName);
                output += `<option value="${countryName}">${countryName}</option>`;
            });

            selectDrop.innerHTML = output;
        })
    .catch(err => {console.log(err);})
});



