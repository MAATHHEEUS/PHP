const mostraDesc = (eventoId) => {
    let evento = document.getElementById(`span_${eventoId}`);
    evento.style.whiteSpace = window.getComputedStyle(evento).whiteSpace === 'nowrap' ? 'normal' : 'nowrap';
}

const toggleForm = () => {
    let form = document.getElementById("evento-form");
    form.style.display = window.getComputedStyle(form).display === 'flex' ? 'none' : 'flex';
}