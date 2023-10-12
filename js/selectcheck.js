document.addEventListener("DOMContentLoaded", () => {
  const modal1 = document.querySelector("#staticBackdrop");
  const modal2 = document.querySelector("#editModal");
  const selectBtn1 = modal1.querySelector(".select-btn");
  const selectBtn2 = modal2.querySelector(".select-btn");
  const itens1 = modal1.querySelectorAll(".item");
  const itens2 = modal2.querySelectorAll(".item");
  const allSelect1 = modal1.querySelector("#all-select2");
  const allSelect2 = modal2.querySelector("#all-select");

  // Adicione um evento de clique para alternar a classe "open" para o botão de seleção de cada modal
  selectBtn1.addEventListener("click", () => {
    selectBtn1.classList.toggle("open");
  });

  selectBtn2.addEventListener("click", () => {
    selectBtn2.classList.toggle("open");
  });

  // Adicione a lógica para seleção de itens de cada modal
  function toggleItemSelection(item) {
    const checkbox = item.querySelector('.checkbox');
    checkbox.checked = !checkbox.checked;
    item.classList.toggle('selected');
    updateButtonText(modal1, itens1);
    updateButtonText(modal2, itens2);
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

  // Adicione a lógica para selecionar ou desmarcar todos os itens de cada modal
  function toggleSelectAll(modal, items, allSelect) {
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
    updateButtonText(modal, items);
  }

  allSelect1.addEventListener("click", () => {
    toggleSelectAll(modal1, itens1, allSelect1);
  });

  allSelect2.addEventListener("click", () => {
    toggleSelectAll(modal2, itens2, allSelect2);
  });

  // Função para atualizar o texto do botão de seleção
  function updateButtonText(modal, items) {
    const checkedItems = Array.from(items).filter(item => {
      const checkbox = item.querySelector('.checkbox');
      return checkbox.checked;
    });

    const btnText = modal.querySelector(".btn-text");

    if (checkedItems && checkedItems.length > 0) {
      const itemCount = checkedItems.length;
      btnText.innerText = itemCount > 1 ? `${itemCount} Cursos` : `${itemCount} Curso`;
    } else {
      btnText.innerText = "Selecionar Curso";
    }
  }
});