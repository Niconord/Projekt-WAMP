export default class Film{
    constructor() {
    }


async DisneyEllerEj(){

    try{
        const responseNonHorror = await this.DurFilmenTilBoern(true);


        const responseHorror = await this.ErDetEnGyser('LidtGys');
        console.log(responseHorror);
    }catch (error) {
        console.log('Fejl: ' + error);
    }
}





    DurFilmenTilBoern(ErFilmenEgnetTilBoern){
        return new Promise((resolve, reject) => {

            setTimeout(() => {

                if (ErFilmenEgnetTilBoern) {
                    resolve('Ja, filmen er egnet til folk under 15');
                } else {
                    reject('Nej, filmen egner sig til folk over 15');
                }

            }, 1000);
        });
    }

    ErDetEnGyser(horror){
        return new Promise((resolve, reject) => {
            setTimeout(() => {

                if(horror === 'Nej'){
                    resolve('Nej, det er ikke en gyser');
                } else if(horror === 'LidtGys'){
                    reject('Der er elementer af horror i denne film');
                } else{
                    reject('Ja! Den er skræmmende');
                }

            }, 2000);
        })

    }

}