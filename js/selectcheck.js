document.addEventListener("DOMContentLoaded", () => {
    const selectBtn = document.querySelector(".select-btn");
    const itens = document.querySelectorAll(".item");
    const allSelect = document.querySelector("#all-select");
  
    selectBtn.addEventListener("click", () => {
      selectBtn.classList.toggle("open");
    });
  
    allSelect.addEventListener("click", () => {
      const isChecked = allSelect.classList.contains("checked");
  
      if (!isChecked) {
        itens.forEach(item => {
          item.classList.add("checked");
        });
      } else {
        itens.forEach(item => {
          item.classList.remove("checked");
        });
      }
  
      allSelect.classList.toggle("checked");
      updateButtonText();
    });
  
    itens.forEach(item => {
      item.addEventListener("click", () => {
        item.classList.toggle("checked");
        updateButtonText();
      });
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
  