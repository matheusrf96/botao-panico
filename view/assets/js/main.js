function updateSolicitacao(id, resp){
    $.ajax({
        url: "/tcc/control/responder-solicitacoes.php",
        data: {id: id, resp: resp},
        type: "GET",
        success: (data) => {
            document.getElementById('log').innerHTML = "Sucesso!";
        },
        error: () => {
            document.getElementById('log').innerHTML = "Erro!";
        }    
    });
}