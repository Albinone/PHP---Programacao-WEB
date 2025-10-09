let xmlContent = '';

let tableCds = document.getElementById('cds');

fetch('cd3.xml').then((response) => {
    response.text().then((xml) => {

        let parser = new DOMParser();
        let xmlDOM = parser.parseFromString(xml, 'application/xml');
        let cds = xmlDOM.querySelectorAll('CD');

        cds.forEach(cdNode => {

            let row = document.createElement('tr');

            //Title
            let td = document.createElement('td');
            td.innerText = cdNode.children[0].innerHTML;
            row.appendChild(td);

            //  Artist
            td = document.createElement('td');
            td.innerText = cdNode.children[1].innerHTML;
            row.appendChild(td);
            
            // Country
            td = document.createElement('td');
            td.innerText = cdNode.children[2].innerHTML;
            row.appendChild(td);

            // Company
            td = document.createElement('td');
            td.innerText = cdNode.children[3].innerHTML;
            row.appendChild(td);

            // Price
            td = document.createElement('td');
            td.innerText = '$' + cdNode.children[4].innerHTML;
            row.appendChild(td);

            // Year
            td = document.createElement('td');
            td.innerText = cdNode.children[5].innerHTML;
            row.appendChild(td);

            tableCds.children[1].appendChild(row);

        })
    
    })
})