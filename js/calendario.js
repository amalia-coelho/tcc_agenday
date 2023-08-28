document.addEventListener('DOMContentLoaded', function () {
    const monthsBR = ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];
    const tableDays = document.getElementById('dias');

    function GetDaysCalendar(mes, ano) {
        document.getElementById('mes').innerHTML = monthsBR[mes];
        document.getElementById('ano').innerHTML = ano;

        let firstDayOfWeek = new Date(ano, mes, 1).getDay() - 0;
        let getLastDayThisMonth = new Date(ano, mes + 1, 0).getDate()

        const allDayCells = tableDays.querySelectorAll('td'); // Seleciona todas as células <td>

        for (let i = 0; i < allDayCells.length; i++) {
            let dt = new Date(ano, mes, i - firstDayOfWeek + 1); // Ajusta o índice para começar a partir do primeiro dia da semana
            let dayTable = allDayCells[i];

            if (dt.getMonth() !== mes) {
                dayTable.classList.add('mes-anterior');
                dayTable.classList.remove('proximo-mes');
            } else if (i >= getLastDayThisMonth + firstDayOfWeek) {
                dayTable.classList.add('proximo-mes');
                dayTable.classList.remove('mes-anterior');
            } else {
                dayTable.classList.remove('mes-anterior');
                dayTable.classList.remove('proximo-mes');
            }

            dayTable.innerHTML = dt.getDate();
        }
    }

    let now = new Date();
    let mes = now.getMonth();
    let ano = now.getFullYear();
    GetDaysCalendar(mes,ano);

    const proximo = document.getElementById('btn-next');
    const anterior = document.getElementById('btn-ant');
    
    console.log(proximo);

    proximo.onclick = function(){
        mes++;
        if(mes > 11){
            mes = 0;
            ano++;
        }
        GetDaysCalendar(mes,ano);
        
    }
    anterior.onclick = function(){
        mes--;
        if(mes < 0){  // Deve ser "menor que 0" em vez de "maior que 0"
            mes = 11;
            ano--;
        }
        GetDaysCalendar(mes,ano);
    }

})