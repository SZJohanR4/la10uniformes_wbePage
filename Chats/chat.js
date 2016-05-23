function actualizarTime(time) {
    acSegMill = ((time) * 1000);
    alert("Se actualizara cada " + (time) + " segundos.");
}
function $(id) {
    return document.getElementById(id);
}
function replace_s(texto, s1, s2) {
    return texto.split(s1).join(s2);
}
function addEvent(obj, evType, fn, useCapture) {
    if (obj.addEventListener) {
        obj.addEventListener(evType, fn, useCapture);

    } else if (obj.attachEvent) {
        obj[fn + evType] = fn;
        obj[fn + evType + 'n'] = function () {
            obj[fn + evType](window.event);
        }
        obj.attachEvent("on" + evType, obj[fn + evType + 'n']);

    } else {
        obj['on' + evType] = fn;
    }
}
function removeEvent(obj, evType, fn, useCapture) {
    if (obj.removeEventListener) {
        obj.removeEventListener(evType, fn, useCapture);
    } else if (obj.detachEvent) {
        obj.detachEvent("on" + evType, obj[fn + evType + 'n']);
        obj[fn + evType + 'n'] = null;
    } else {
        obj['on' + evType] = function () {
        };
    }
}

function stopEvent(e) {
    if (!e)
        e = window.event;
    if (e.stopPropagation) {
        e.stopPropagation();
    } else {
        e.cancelBubble = true;
    }
}
function cancelEvent(e) {
    if (!e)
        e = window.event;
    if (e.preventDefault) {
        e.preventDefault();
    } else {
        e.returnValue = false;
    }
}



function getNextHighestDepth() {
    var tCol = document.getElementsByTagName('*');
    var z = 0;
    for (var i = 0; i < tCol.length; i++) {
        if (tCol[i].style.zIndex > z) {
            z = tCol[i].style.zIndex;
        }

    }
    return ++z;
}
arrastrable = {};

function mover(e) {
    arrastrable.c2x = e.clientX;
    arrastrable.c2y = e.clientY;
    this.style.left = arrastrable.c2x - arrastrable.c1x + arrastrable.o1x + 'px';
    this.style.top = arrastrable.c2y - arrastrable.c1y + arrastrable.o1y + 'px';
    cancelEvent(e);
    stopEvent(e);
}

function detener() {
    removeEvent(this, 'mousemove', mover, false);
    removeEvent(this, 'mouseup', detener, false);
}

function i(e) {
    if (this.position != "relative" || !this.style.position) {
        this.style.position = "relative";
        this.style.cssFloat = "none";
        this.style.zIndex = getNextHighestDepth();
    }
    arrastrable.c1x = e.clientX;
    arrastrable.c1y = e.clientY;
    arrastrable.o1x = !isNaN(parseInt(this.style.left)) ? parseInt(this.style.left) : 0;
    arrastrable.o1y = !isNaN(parseInt(this.style.top)) ? parseInt(this.style.top) : 0;
    addEvent(this, 'mousemove', mover, false);
    addEvent(this, 'mouseup', detener, false);
    addEvent(this, 'mouseout', detener, false);
    cancelEvent(e);
    stopEvent(e);
}

function makeDraggable() {
    for (var j = 0; j < arguments.length; j++) {
        $(arguments[j]).style.cursor = 'move';
        addEvent($(arguments[j]), 'mousedown', i, false);
    }
}
navHover = function () {
    var lis = document.getElementById("menu-h").getElementsByTagName("LI");
    for (var i = 0; i < lis.length; i++) {
        lis[i].onmouseover = function () {
            this.className += " iehover";
        }
        lis[i].onmouseout = function () {
            this.className = this.className.replace(new RegExp(" iehover\\b"), "");
        }
    }
}
function set_opacity(div, val) {
    if (typeof div.filters != 'undefined') {
        val *= 100;
        try {
            div.filters.item("DXImageTransform.Microsoft.Alpha").opacity = val;
        } catch (e) {
            div.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + val + ')';
        }
    } else {
        div.style.opacity = val;
        div.style.MozOpacity = val;
    }
}

var transicion = function (inicio, fin, segundos) {
    var _this = this;
    this.test = 0;
    if (_this.intervalo)
        clearInterval(_this.intervalo);
    if (this.val && Math.abs(fin - _this.val) < 0.01)
        return;
    this.val = !this.val ? inicio < 1 ? inicio + .0001 : inicio : this.val;
    set_opacity(this, this.val);
    this.pasos = (fin - inicio) / 100;
    this.pausa = segundos * 10;
    this.intervalo = setInterval(
            function () {
                if (_this.test > 99 || Math.abs(fin - _this.val) < 0.01) {
                    clearInterval(_this.intervalo);

                }
                _this.test++;
                _this.val = _this.val + _this.pasos;
                if (_this.val <= .01)
                    _this.style.visibility = 'hidden';
                else
                    _this.style.visibility = 'visible';
                set_opacity(_this, _this.val);
            }, this.pausa);
}
function verGET(e, t, c) {
    if (!c) {
        if (!t)
            t = 1;
        var obj = document.getElementById(e);
        transicion.call(obj, 0, 1, t);
        obj.style.zIndex = getNextHighestDepth();
    } else {
        $(e).style.visibility = 'visible';
    }
}
function cerrarGET(e, t, c) {
    if (!c) {
        if (!t)
            t = 1;
        var obj = document.getElementById(e);
        transicion.call(obj, 1, 0, t);
    } else {
        $(e).style.visibility = 'hidden';
    }
}
function getXMLHttpRequest() {
    var aVersions = ["MSXML2.XMLHttp.5.0",
        "MSXML2.XMLHttp.4.0", "MSXML2.XMLHttp.3.0",
        "MSXML2.XMLHttp", "Microsoft.XMLHttp"
    ];

    if (window.XMLHttpRequest) {
        // para IE7, Mozilla, Safari, etc: que usen el objeto nativo
        return new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        // de lo contrario utilizar el control ActiveX para IE5.x y IE6.x
        for (var i = 0; i < aVersions.length; i++) {
            try {
                var oXmlHttp = new ActiveXObject(aVersions[i]);
                return oXmlHttp;
            } catch (error) {
                //no necesitamos hacer nada especial
            }
        }
    }
}
function ir(url, par, d, p, t, c, cc, ccc, f, call, ft) {
    var ajax = getXMLHttpRequest();
    ajax.open(p, url, true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    ajax.onreadystatechange = respuesta;
    ajax.send(par);
    function respuesta() {
        if (ajax.readyState == 4) {
            if (ajax.status == 200) {
                if (!ft)
                    document.getElementById(d).innerHTML = ajax.responseText;
                verGET(d);
                if (f)
                    call;
                if (cc)
                    cerrarGET(ccc);
            }
        } else {
            if (t)
                document.getElementById(d).innerHTML = c;
        }
    }
}
function actualizarList() {
    location.href = "#ultimo";
    $('mensaje').focus();
}
function verificarPOST() {
    verifict = setTimeout(
            function () {
                ir('inter.php', 'r=' + Math.random() + '&t=ver&sala=' + sala, 'coment_tr', 'POST', false, null, null, null, true, actualizarList());
                verificarPOST();
            }
    , acSegMill);
}
function verUsGET() {
    verifict2 = setTimeout(
            function () {
                ir('inter.php', 'r=' + Math.random() + '&t=user&sala=' + sala + '&user=' + user, 'usuarios', 'POST', false);
                verUsGET();
            }
    , acSegMill);
}
function conectarGET(_this) {
    if (_this.value == "Conectar") {
        html('usuarios', '<p>&nbsp;</p> <p>&nbsp;</p> <p align="center">Cargando...</p>');
        $('mensaje').disabled = this.checked;
        $('enviar').disabled = this.checked;
        _this.value = "Desconectar";
        cerrarGET('coment_tr');
        verGET('cargando', true);
        verGET('sala');
        ir('inter.php', 'r=' + Math.random() + '&t=ver&sala=' + sala, 'coment_tr', 'POST', false, null, true, 'cargando', true, actualizarList());
        verificarPOST();
        verGET('cargando', true);
        ir('inter.php', 'r=' + Math.random() + '&t=user&sala=' + sala, 'usuarios', 'POST', false, null, true, 'cargando', true, verUsGET());
        ir('inter.php', 'r=' + Math.random() + '&t=conectar&name=' + user + '&sala=' + sala, null, 'POST', false, null, true, 'cargando', false, null, true);
    } else {
        $('mensaje').disabled = !this.checked;
        $('enviar').disabled = !this.checked;
        ir('inter.php', 'r=' + Math.random() + '&t=desconectar&user=' + user, null, 'POST', false, null, true, 'cargando', false, null, true);
        _this.value = "Conectar";
        document.getElementById('coment_tr').innerHTML = '<strong>[Desconectado]</strong> OFF';
        cerrarGET('cargando');
        cerrarGET('usuarios');
        cerrarGET('sala');
        verGET('coment_tr');
        clearTimeout(verifict);
        clearTimeout(verifict2);
    }
}

function enviarGET(_this) {
    text = _this.value;
    if (replace_s(text, ' ', '') != "") {
        _this.value = '';
        ir('inter.php', 'r=' + Math.random() + '&t=insert&name=' + user + '&cont=' + text + '&sala=' + sala, null, 'POST', false, null, true, 'cargando', false, null, true);
    } else {
        alert('Escriba algo.');
    }
}
flag = 0;
function addTex(let) {
    var forms = "mensaje";
    var story = $(forms).value;
    if (let == "BACK") {
        story = story.substring(0, story.length - 1);
        $(forms).value = story;
        $(forms).focus();
    } else if (flag == 1) {
        story += let.toUpperCase();
        flag = 0;
        $(forms).value = story;
        $(forms).focus();
    } else {
        story += let;
        flag = 0;
        $(forms).value = story;
        $(forms).focus();
    }
}
function capIt() {
    flag = 1;
}
// BBcodes
function escribir_web() {
    title = prompt('Titulo:', "");
    if (title != null) {
        web = prompt('Direcion web:', "http://");
        if (web == "http://" || web == null) {
            alert('No as escrito una direccion valida.');
        } else {
            addTex('[url=' + web + ']' + title + '[/url]');
        }
    }
}
function b() {
    texto = prompt('Texto en negritas:', "");
    if (texto == null || texto == "") {
        alert("Nada");
    }
    else {
        addTex('[b]' + texto + '[/b]');
    }
}
function it() {
    texto = prompt('Texto:', "");
    if (texto == null || texto == "") {
        alert("Nada");
    }
    else {
        addTex('[i]' + texto + '[/i]');
    }
}
function u() {
    texto = prompt('Texto subrayado:', "");
    if (texto == null || texto == "") {
        alert("Nada");
    }
    else {
        addTex('[u]' + texto + '[/u]');
    }
}
function imagen() {
    image = prompt('Direcion de la imagen:', "http://");
    if (image == null || image == "") {
        alert("Nada");
    }
    else {
        addTex('[img]' + image + '[/img]');
    }
}
function colo() {
    texto = prompt('Texto:', "");
    if (texto == null || texto == "") {
        alert("Nada");
    }
    else {
        color = prompt('Color:  (Ej.: red,blue o puede ser html)', "");
        if (color == null || color == "") {
        } else {
            addTex('[color=' + color + ']' + texto + '[/color]');
        }
    }
}
/////////////////////////////////////////////////
function html(d, t) {
    $(d).innerHTML = t;
}
function restartClass() {
    var lis = document.getElementById("sala").getElementsByTagName("div");
    for (i = 0; i < lis.length; i++) {
        lis[i].className = "sala";
    }
}
function selecSala() {
    var lis = document.getElementById("sala").getElementsByTagName("div");
    for (i = 0; i < lis.length; i++) {
        lis[i].onclick = function () {
            restartClass();
            this.className = "sala_ac";
            sala = this.getAttribute('sala');
            verGET('cargando');
            ir('inter.php', 'r=' + Math.random() + '&t=ver&sala=' + sala, 'coment_tr', 'POST', false, null, true, 'cargando', true, actualizarList());
            ir('inter.php', 'r=' + Math.random() + '&t=user&sala=' + sala, 'usuarios', 'POST', false, null, true, 'cargando');
            ir('inter.php', 'r=' + Math.random() + '&t=conectar&name=' + user + '&sala=' + sala, null, 'POST', false, null, true, 'cargando', false, null, true);
            html('salaET', sala);
        }
    }
}
function envAUT(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13 && !e.shiftKey) {
        enviarGET($('mensaje'));
        return false;
    }
    return true;
}
function verSalGET() {
    $('users').className = "tabs";
    $('salas').className = "tabs_ac";
    $('sala').style.display = "block";
    $('usuarios').style.display = "none";
}
function verUGET() {
    $('users').className = "tabs_ac";
    $('salas').className = "tabs";
    $('usuarios').style.display = "block";
    $('sala').style.display = "none";
}
window.onload = function () {
    makeDraggable('bbcode');
    makeDraggable('config');
    $('mensaje').disabled = !this.checked;
    $('enviar').disabled = !this.checked;
    $('nik').innerHTML = " <strong>Nick: </strong>" + user;
    addEvent($('users'), 'click', verUGET, false);
    addEvent($('salas'), 'click', verSalGET, false);
    selecSala();
    verGET('box');
    cerrarGET('cargando');
}