var baseUrl = "http://localhost/rent-service/";

async function displayModels(){
    let company_id = document.getElementById("company_id").value;
    let response = await fetch(baseUrl+"getModelsByCompany.php?company_id="+company_id);
    
    let models = await response.json();

    console.log(models);

    let modelsHTML = '';

    models.forEach( (model) => {
        modelsHTML += `<option value="${model.id}" >${model.model_name}</option>`;
    });

    document.getElementById("model_id").innerHTML = modelsHTML;
}


