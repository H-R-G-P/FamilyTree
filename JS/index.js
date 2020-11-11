function f() {
    let sister = $('#addSister');

    sister.collapse('toggle')
    // sister.collapse('toggle');
}
// TODO: Разобраться как работают методы в collapse
function d() {
    let sister = $('#addSister');

    sister.collapse('toggle')
}

function addPeople() {
    let people = $('#addPeople');
    let sister = $('#addSister');
    let brother = $('#addBrother');

    if (people.hasClass('show')) {
        console.log('this button have class show')
    }
    else {
        console.log('this button have not class show')
        if (sister.hasClass('show')) sister.collapse({toggle : false});
        else brother.collapse({toggle : false});
        people.collapse({toggle : true});
    }
}

function addSister() {
    let people = $('#addPeople');
    let sister = $('#addSister');
    let brother = $('#addBrother');

    if (sister.hasClass('show')) {
        console.log('this button have class show')
    }
    else {
        console.log('this button have not class show')
        if (people.hasClass('show')) people.collapse({toggle : false});
        else brother.collapse({toggle : false});
        sister.collapse({toggle : true});
    }
}

function addBrother() {
    let people = $('#addPeople');
    let sister = $('#addSister');
    let brother = $('#addBrother');

    if (brother.hasClass('show')) {
        console.log('this button have class show')
    }
    else {
        console.log('this button have not class show')
        if (people.hasClass('show')) people.collapse({toggle : false});
        else sister.collapse({toggle : false});
        brother.collapse({toggle : true});
    }
}