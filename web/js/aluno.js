$(function(){

    $("#aluno-cep").change(function() {

        cep = $("#aluno-cep").val();

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
                $("#aluno-logradouro").val("");
                $("#aluno-bairro").val("");
                $("#aluno-cidade").val("");
                $("#aluno-estado").val("");
                alert("CEP não encontrado.");
            }
        });
    });
});