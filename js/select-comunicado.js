document.addEventListener("DOMContentLoaded", () => {
    const turma = document.querySelector(".turma");
    const sindrome = document.querySelector(".sindrome");
    const selectBtn1 = turma.querySelector(".select-btn");
    const selectBtn2 = sindrome.querySelector(".select-btn");
    const itens1 = turma.querySelectorAll(".item");
    const itens2 = sindrome.querySelectorAll(".item");
    const allSelect1 = turma.querySelector("#all-select1");
    const allSelect2 = sindrome.querySelector("#all-select2");

    // Adicione um evento de clique para alternar a classe "open" para o botão de seleção de cada turma
    selectBtn1.addEventListener("click", () => {
        selectBtn1.classList.toggle("open");
    });

    selectBtn2.addEventListener("click", () => {
        selectBtn2.classList.toggle("open");
    });

    // Adicione a lógica para seleção de itens de cada turma
    function toggleItemSelection(item) {
        const checkbox = item.querySelector('.checkbox');
        checkbox.checked = !checkbox.checked;
        item.classList.toggle('selected');
        updateButtonText(turma, itens1);
    }

    itens1.forEach(item => {
        item.addEventListener('click', () => {
            toggleItemSelection(item);
        });
    });

    itens2.forEach(item => {
        item.addEventListener('click', () => {
            toggleItemSelection(item);
        });
    });

    // Adicione a lógica para selecionar ou desmarcar todos os itens de cada turma
    function toggleSelectAll(turma, items, allSelect) {
        const isChecked = allSelect.classList.contains("checked");

        if (!isChecked) {
            items.forEach(item => {
                item.classList.add("checked");
                const checkbox = item.querySelector('.checkbox');
                checkbox.checked = true;
            });
        } else {
            items.forEach(item => {
                item.classList.remove("checked");
                const checkbox = item.querySelector('.checkbox');
                checkbox.checked = false;
            });
        }

        allSelect.classList.toggle("checked");
        updateButtonText(turma, items);
    }

    allSelect1.addEventListener("click", () => {
        toggleSelectAll(turma, itens1, allSelect1);
    });

    // Função para atualizar o texto do botão de seleção
    function updateButtonText(turma, items) {
        const checkedItems = Array.from(items).filter(item => {
            const checkbox = item.querySelector('.checkbox');
            return checkbox.checked;
        });

        const btnText = turma.querySelector(".btn-text");

        if (checkedItems && checkedItems.length > 0) {
            const itemCount = checkedItems.length;
            btnText.innerText = itemCount > 1 ? `${itemCount} Cursos` : `${itemCount} Curso`;
        } else {
            btnText.innerText = "Selecionar Curso";
        }
    }



//    let dropdown = document.querySelector('.dropdown');
//    dropdown.onclick = function(){
//     dropdown.classList.toggle('active');
//    }
});