$(function(){

    $("input[name='AlunoSearch[data_nascimento]']").change(function(){
        alert("teste");
    });

    $("#aluno-cep").change(function() {

        cep = $("#aluno-cep").val();

        // console.log(cep);
        // console.log(Number.isInteger(parseInt(cep)));

        if(cep.length < 8){
            alert("Por favor, coloque o CEP com 8 digitos!");
            $("#aluno-cep").val("");
        }else if(!Number.isInteger(parseInt(cep))){
            alert("Por favor, preencha o campo com valores numéricos!");
            $("#aluno-cep").val("");
        }

        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {
                //Atualiza os campos com os valores da consulta.
                $("#aluno-logradouro").val(dados.logradouro);
                $("#aluno-bairro").val(dados.bairro);
                $("#aluno-cidade").val(dados.localidade);
                $("#aluno-estado").val(dados.uf);
            } //end if.
            else {
                //CEP pesquisado não foi encontrado.
                $("#aluno-cep").val("");
                $("#aluno-logradouro").val("");
                $("#aluno-bairro").val("");
                $("#aluno-cidade").val("");
                $("#aluno-estado").val("");
                alert("CEP não encontrado.");
            }
        });
    });
});