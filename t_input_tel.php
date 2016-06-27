<html>
<head>
<meta charset="utf-8">
<meta content="Ceci est le contenu de....">
<title>Hello World</title>
<style>
input[type="range"] {
    position: relative;
    margin-left: 1em;
}
input[type="range"]:after,
input[type="range"]:before {
    position: absolute;
    top: 1em;
    color: #aaa;
}
input[type="range"]:before {
    left:0em;
    content: attr(min);
}
input[type="range"]:after {
    right: 0em;
    content: attr(max);
}
</style>

</head>


<body>


<div id="form_div">
<div><input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"></div>
<div><input type="email" name="user_email"></div>
<div><input type="search" placeholder="Entrez un mot-clef" name="the_search"></div>
<div><input type="date" name="anniversaire"></div>
<div><input type="month" name="holidays"></div>
<div><input type="number" name="howmuch"></div>
<div><input type="range"></div>
<div><input type="range" value="15" max="50" min="0" step="5"></div>
<div><input type="color" value="#fad345" name="textcolor"></div>
</div>


</body>
</html>
