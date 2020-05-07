// Javascript
console.info('JS geladen.');


function autofillAusleihDatum(){
    var status = document.getElementById('mitgliederstatus').value;

    console.info('in method');
    if(status.toLowerCase == 'keine')
    {
        document.getElementById('ausleihdatum').value = dateObj.setDate(dateObj.getDate() + 30);
    }
    else if(status.toLowerCase == 'bronze')
    {
        document.getElementById('ausleihdatum').value = dateObj.setDate(dateObj.getDate() + 40);
    }
    else if(status.toLowerCase == 'silber')
    {
        document.getElementById('ausleihdatum').value = dateObj.setDate(dateObj.getDate() + 50);
    }
    else if(status.toLowerCase == 'gold')
    {
        document.getElementById('ausleihdatum').value = dateObj.setDate(dateObj.getDate() + 70);
    }
}