require('./bootstrap');

// oggetto elementi button 'Cancella'
const deleteBtn = document.getElementsByClassName('delete_btn');
// oggetto elementi button 'Annulla'
const cancelBtn = document.getElementsByClassName('cancel_btn');

// ciclo n volte quanti sono i bottoni 'Cancella' e 'Annulla' (nel nostro caso stessa quantità)
for(let i = 0; i < deleteBtn.length; i++) {

    // per ogni elemento button 'Cancella', mi salvo il suo id che corrisponde al valore della colonna ID dell'elemento
    const elementId = deleteBtn[i].getAttribute("id");

    deleteBtn[i].addEventListener('click', function() {
        document.querySelector(`.alert_delete_${elementId}`).classList.remove('display_none');
    });

    cancelBtn[i].addEventListener('click', function() {
        document.querySelector(`.alert_delete_${elementId}`).classList.add('display_none');
    });
}