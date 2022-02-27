var counter = 1;

function add_more_field(){
    counter += 1;

    var html = '<div id="row'+counter+'">\
                    <label>Estrofe</label>\
                    <textarea type="text" name="estrofe[]" class="form-control" id="estrofe" style="width: 100%;"></textarea>\
                    <div>\
                        <button type="button" class="btn btn-sm btn-danger mt-2" id="'+counter+'" onclick="remove(this)"> Remover Estrofe</button>\
                    </div>\
                </div>'

    var form = document.getElementById('poem_form')
    form.innerHTML+=html
}

function remove(button){
    let number = button.id;
    let row = document.getElementById('row' + number);
    row.remove();
}