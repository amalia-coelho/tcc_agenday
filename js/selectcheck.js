document.addEventListener("DOMContentLoaded", () => {
  const selectBtn = document.querySelector(".select-btn");
  const itens = document.querySelectorAll(".item");
  const allSelect = document.querySelector("#all-select");

  selectBtn.addEventListener("click", () => {
    selectBtn.classList.toggle("open");
  });


  const itemElements = document.querySelectorAll('.item');
  itemElements.forEach(item => {
    item.addEventListener('click', () => {
      // Encontre o checkbox associado a esta opção
      const checkbox = item.querySelector('.checkbox');

      // Verifique se o checkbox está marcado ou desmarcado e atualize-o
      checkbox.checked = !checkbox.checked;

      // Adicione ou remova uma classe para destacar visualmente a seleção
      if (checkbox.checked) {
        item.classList.add('selected');
      } else {
        item.classList.remove('selected');
      }
    });
  });
  allSelect.addEventListener("click", () => {
    const isChecked = allSelect.classList.contains("checked");

    if (!isChecked) {
      itens.forEach(item => {
        item.classList.add("checked");

        // Marque também o checkbox associado ao item
        const checkbox = item.querySelector('.checkbox');
        checkbox.checked = true;
      });

      // Marque também os checkboxes dentro da UL
      const ulCheckboxes = document.querySelectorAll('.list-itens .checkbox');
      ulCheckboxes.forEach(checkbox => {
        checkbox.checked = true;
      });
    } else {
      itens.forEach(item => {
        item.classList.remove("checked");

        // Desmarque também o checkbox associado ao item
        const checkbox = item.querySelector('.checkbox');
        checkbox.checked = false;
      });

      // Desmarque também os checkboxes dentro da UL
      const ulCheckboxes = document.querySelectorAll('.list-itens .checkbox');
      ulCheckboxes.forEach(checkbox => {
        checkbox.checked = false;
      });
    }

    allSelect.classList.toggle("checked");
    updateButtonText();
  });

  function updateButtonText() {
    let checkedItems = document.querySelectorAll(".item.checked");
    let btnText = document.querySelector(".btn-text");

    if (checkedItems && checkedItems.length > 0) {
      // Excluir o botão "Todos" da contagem
      const itemCount = checkedItems.length - 0; // Subtrair 1 para ignorar o botão "Todos"
      btnText.innerText = itemCount > 1 ? `${itemCount} Cursos` : `${itemCount} Curso`;
    } else {
      btnText.innerText = "Selecionar Curso";
    }
  }

  updateButtonText();
});