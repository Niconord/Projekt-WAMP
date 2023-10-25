export default class  Products {
    constructor() {
        this.data = {
            password: "GlenKim"
        }

        this.rootElem = document.querySelector('.products');
        this.filter = this.rootElem.querySelector('.filter');
        this.items = this.rootElem.querySelector('.items');

        this.nameSearch = this.filter.querySelector('.nameSearch');

    }


    async init(){
        this.nameSearch.addEventListener('input', () => {
            if(this.nameSearch.value.length >= 3){
                this.render();
            }

        });

        await this.render();
    }


    async render(){
        const data = await this.getData();

        const row = document.createElement('div');
        row.classList.add('row', 'g-4');

        for(const item of data){
            const col = document.createElement('div');
            col.classList.add('col-md-6', 'col-lg-4', 'col-xl-3');

            col.innerHTML = `
                <div class="card">                 
                    <img src="uploads/${item.filmBillede}" class="card-img-top" alt="FilmPlakat">                   
                    <div class="card-body">
                        <h5 class="card-title">${item.filmnavn}</h5>
                        <p class="beskrivelse">${item.filmbeskrivelse}</p>
                        <a href="detaljer.php?filmid=${item.filmid}" class="btn btn-primary text-white w-100">Læs mere her</a>
                    </div>
                </div>
            
            
            `;



            row.appendChild(col);

        }

        this.items.innerHTML = '';
        this.items.appendChild(row);

    }

    async getData(){
        this.data.nameSearch = this.nameSearch.value;


        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();
    }
}