<script>
document.getElementById('importButton').addEventListener('click', function() {
    const fileInput = document.getElementById('jsonFile');
    
    fileInput.addEventListener('change', function() {
        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const jsonContent = e.target.result;
                const jsonData = JSON.parse(jsonContent);

                // Chame uma função para preencher a tabela com os dados JSON
                preencherTabela(jsonData);
            };

            reader.readAsText(file);
        }
    });
});

function preencherTabela(data) {
    const table = document.querySelector('table tbody');
    table.innerHTML = '';

    data.forEach(function(item) {
        const row = table.insertRow();
        const idCell = row.insertCell(0);
        const disciplinaCell = row.insertCell(1);
        const professorCell = row.insertCell(2);
        const cargaCell = row.insertCell(3);

        idCell.textContent = item.id;
        disciplinaCell.textContent = item.disciplina;
        professorCell.textContent = item.prof;
        cargaCell.textContent = item.carga;
    });
}
</script>
