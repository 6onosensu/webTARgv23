let selectedTd;

table.onclick = function (event) {
    let target = event.target; // где был клик?

    if (target.tagName != 'TD') return; // не на TD? тогда не интересует

    highlight(target); // подсветить TD
};

function highlight(td) {
    if (selectedTd) { // убрать существующую подсветку, если есть
        selectedTd.classList.remove('highlight');
    }
    selectedTd = td;
    selectedTd.classList.add('highlight'); // подсветить новый td
}
table.onclick = function (event) {
    let td = event.target.closest('td'); // (1)

    if (!td) return; // (2)

    if (!table.contains(td)) return; // (3)

    highlight(td); // (4)
};