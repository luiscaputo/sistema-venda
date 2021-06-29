$(() => {
  $('#register_bi').click((e)=>{
    e.preventDefault();

    let nome = $('#nome');
    let nif = $('nif');

    $.post(register.php, {
      nome:nome,
      bi:bi
    }, (res) => {
      if(res == 1){
        $('input').val('');
        alert('Cadastramento Efectuado!')
      }else {
        alert(res)
      }
    });
  });
});