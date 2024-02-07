<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Älykellon sovellusten suunittelu työkalu</title>

<?php
$random = rand(0, 10);
if($random==0){$color ="#1d4596";}
if($random==1){$color ="#961d96";}
if($random==2){$color ="#b80f30";}
if($random==3){$color ="#ed0c0c";}
if($random==4){$color ="#0c26ed";}
if($random==5){$color ="#04d697";}
if($random==6){$color ="#04d612";}
if($random==7){$color ="#adbf04";}
if($random==8){$color ="#bf8404";}
if($random==9){$color ="#bf3904";}
if($random==10){$color ="#04bcbf";}
?>

<style>
    #keha
    {
        width:240px;
        height:240px;
        border:dashed #2a2a2b 32px;
        border-radius:188px;
        position:absolute;
        transform: rotate(0deg);
        top:108px;
        left:108px;
    } 
    #keha_tausta
    {
        width:240px;
        height:240px;
        border:solid #39393b 32px;
        border-radius:188px;
        position:absolute;
        transform: rotate(90deg);
        top:108px;
        left:108px;
    } 
    #reuna
    {
        width:350px;
        height:350px;
        border:solid black 1px;
        border-radius:188px;
        position:absolute;
        transform: rotate(90deg);
        top:85px;
        left:85px;
        background-color:<?php echo $color; ?>;
    } 
    #lcd
    {
        width:240px;
        height:240px;
        border:solid black 1px;
        border-radius:120px;
        position:absolute;
        top:140px;
        left:140px;
        background-color:black;
    } 
    #pohja
    {
        width:200px;
        height:440px;
        border:solid black 1px;
        position:absolute;
        top:40px;
        left:160px;
        background-color:<?php echo $color; ?>;
    }
    #kelloloota
    {
        position:relative; 
        border:solid black 1px; 
        width:520px; 
        height:510px;
        display:inline-block;
    }
    #koodiloota
    {
        position:relative; 
        border:solid black 1px; 
        width:530px; 
        height:700px; 
        display:inline-block;
    }
    #konsoli
    {
        position:relative; 
        border:solid black 1px; 
        width:530px; 
        height:700px; 
        display:inline-block;
    }
    #help
    {
        position:relative; 
        border:solid black 1px; 
        display:inline-block;
    }
    #btn_left
    {
        cursor:not-allowed; opacity:0.1; position:absolute; left:80px; top:430px; width:64px; height:64px; 
    }
    #btn_right
    {
        cursor:not-allowed; opacity:0.1; position:absolute; left:378px; top:430px; width:64px; height:64px;
    }
    #btn_down
    {
        cursor:not-allowed; opacity:0.1; position:absolute; left:435px; top:330px; width:64px; height:64px;    
    }
    #btn_up
    {
        cursor:not-allowed; opacity:0.1; position:absolute; left:435px; top:140px; width:64px; height:64px;
    }
</style>
<div id=kelloloota>
    <span style="position:absolute; top:0px; left:0px; font-size:150%;"> Kellon simulaattori</span>
<div id=test></div>
<div id=pohja></div>
<div id=reuna></div>
<div id=keha_tausta></div>
<div id=keha></div>	
<div id=lcd></div>

<input hidden type="file" id="fileInput">
   

<button onclick="use_button(0)" id="btn_left"><i class="fa fa-rotate-left" style="font-size:48px;"></i></button>
<button onclick="use_button(1)" id="btn_right"><i class="fa fa-rotate-right" style="font-size:48px;"></i></button>
<button onclick="use_button(2)" id="btn_down"><i class="fa fa-check" style="font-size:48px;"></i></button>
<button onclick="use_button(3)" id="btn_up"><i class="fa fa-check" style="font-size:48px;"></i></button>
</div>

<?php 
    $perms="";
    if(isset($_GET["syke"])){$perms="HEART";}
    if(isset($_GET["tallennus"]))
    {
        if($perms=="")
        {
            $perms="SD";
        }
            else
        {
            $perms=$perms.",SD";
        }
    }
    if(isset($_GET["asetukset"]))
    {
        if($perms=="")
        {
            $perms="OPT";
        }
            else
        {
            $perms=$perms.",OPT";
        }
    }
    if(isset($_GET["kirkkaus"]))
    {
        if($perms=="")
        {
            $perms="BRG";
        }
            else
        {
            $perms=$perms.",BRG";
        }
    }
?>
<div id=koodiloota>
     <button style="position:absolute; top:0px; right:250px; font-size:150%; width:100px; cursor:pointer; border:solid black 1px; height:5%; background-color:<?php echo $color; ?>;" id="lueTiedosto"><i class="fa fa-upload"></i></button>
    <button style="position:absolute; top:0px; right:140px; font-size:150%; width:100px;  cursor:pointer; border:solid black 1px; height:5%; background-color:<?php echo $color; ?>;" onclick="download()"><i class="	fa fa-download"></i></button>
    <span style="position:absolute; top:0px; left:0px; font-size:150%;">Koodi editor</span>
    <button style="position:absolute; top:0px; right:0px; font-size:150%; cursor:pointer; border:solid black 1px;  height:5%; background-color:<?php echo $color; ?>;" onclick="runbtn=true; run();"><i class="fa fa-play"></i></button>
    <textarea id=codebox style="position:absolute; width:100%; height:95%; top:5%; left:0%; background-color:black; color:<?php echo $color; ?>; font-size:150%;">name='<?php echo $_GET["name"]; ?>'
dev='<?php echo $_GET["dev"]; ?>'
os_ver='<?php echo $_GET["os"]; ?>'
app_ver='1.0.0'
perms='<?php echo $perms; ?>'

objs='25'
pages='4'
vars='3'

m1 §abc§='LOL'
m2 §fga3§='fsagas'
m3 §vsfat§='0'
m4 §aff§='234'

p1{
        sr_rt='page2'
        sr_lt=''
        bt_up=''
        bt_dn='page3'
        r='100'
        g='0'
        b='100'
}

p2{
        sr_rt=''
        sr_lt='page1'
        bt_up=''
        bt_dn='page3'
        r='0'
        g='100'
        b='0'
}
p3{
        sr_rt='page4'
        sr_lt=''
        bt_up='page1'
        bt_dn=''
        r='150'
        g='150'
        b='0'
}
p4{
        sr_rt=''
        sr_lt='page3'
        bt_up='exit'
        bt_dn=''
        r='150'
        g='150'
        b='0'
}



o1{
	type='box'
	x='99'
	y='45'
	h='50'
	w='50'
	r='255' 
	g='0'
	b='0'
        p='1'
}

o2{
	type='text'
	x='116'
	y='33'
	s='25'
	v='A'
	r='255'
	g='255'
	b='255'
        p='1'
}
o3{
	type='box'
	x='98'
	y='155'
	h='50'
	w='50'
	r='150' 
	g='150'
	b='0'
        p='1'
}

o4{
	type='text'
	x='115'
	y='142'
	s='25'
	v='C'
	r='255'
	g='255'
	b='255'
        p='1'
}
o5{
	type='box'
	x='42'
	y='100'
	h='50'
	w='50'
	r='0' 
	g='0'
	b='200'
        p='2'
}

o6{
	type='text'
	x='60'
	y='88'
	s='25'
	v='D'
	r='255'
	g='255'
	b='255'
        p='2'
}

o7{
	type='box'
	x='154'
	y='100'
	h='50'
	w='50'
	r='255' 
	g='0'
	b='200'
        p='2'
}

o8{
	type='text'
	x='170'
	y='88'
	s='25'
	v='B'
	r='255'
	g='255'
	b='255'
        p='2'
}
o9{
	type='text'
	x='82'
	y='0'
	s='20'
	v='Esimerkki'
	r='255'
	g='255'
	b='255'
        p='0'
}
o10{
	type='text'
	x='83'
	y='80'
	s='30'
	v='SIVU 1'
	r='255'
	g='255'
	b='255'
        p='1'
}
o11{
	type='text'
	x='73'
	y='130'
	s='30'
	v='SIVU 2'
	r='255'
	g='255'
	b='255'
        p='2'
}
o12{
	type='text'
	x='73'
	y='30'
	s='30'
	v='Haluatko'
	r='255'
	g='255'
	b='255'
        p='3'
}
o13{
	type='text'
	x='73'
	y='60'
	s='30'
	v='varmasti'
	r='255'
	g='255'
	b='255'
        p='3'
}
o14{
	type='text'
	x='73'
	y='90'
	s='30'
	v='poistua?'
	r='255'
	g='255'
	b='255'
        p='3'
}

o15{
	type='box'
	x='44'
	y='160'
	h='40'
	w='70'
	r='0' 
	g='100'
	b='0'
        p='3'
}
o16{
	type='box'
	x='128'
	y='160'
	h='40'
	w='70'
	r='150' 
	g='0'
	b='0'
        p='4'
}
o17{
	type='text'
	x='69'
	y='155'
	s='15'
	v='EN'
	r='255'
	g='255'
	b='255'
        p='3'
}
o18{
	type='text'
	x='138'
	y='155'
	s='15'
	v='KYLLÄ'
	r='255'
	g='255'
	b='255'
        p='3'
}
o19{
	type='text'
	x='69'
	y='155'
	s='15'
	v='EN'
	r='255'
	g='255'
	b='255'
        p='4'
}
o20{
	type='text'
	x='138'
	y='155'
	s='15'
	v='KYLLÄ'
	r='255'
	g='255'
	b='255'
        p='4'
}
o21{
	type='text'
	x='73'
	y='30'
	s='30'
	v='Haluatko'
	r='255'
	g='255'
	b='255'
        p='4'
}
o22{
	type='text'
	x='73'
	y='60'
	s='30'
	v='varmasti'
	r='255'
	g='255'
	b='255'
        p='4'
}
o23{
	type='text'
	x='73'
	y='90'
	s='30'
	v='poistua?'
	r='255'
	g='255'
	b='255'
        p='4'
}
o24{
	type='text'
	x='83'
	y='40'
	s='20'
	v='§date§'
	r='255'
	g='255'
	b='255'
        p='2'
}
o25{
	type='text'
	x='100'
	y='194'
	s='20'
	v='§time§'
	r='255'
	g='255'
	b='255'
        p='1'
}

</textarea>
</div>

<div id="konsoli"><span style="position:absolute; top:0px; left:0px; font-size:150%; ">Konsoli</span>
<button onclick=tyhjaa() style="position:absolute; top:0px; right:0px; height:5%; font-size:150%; cursor:pointer; border:solid black 1px; background-color:<?php echo $color; ?>;" ><i class="	fa fa-trash-o"></i></button>
<div id=cmd style="position:absolute; top:5%; height:95%; left:0px; width:100%; border:solid black 1px; background-color:black; color:white; font-size:120%; overflow: auto;"> </div>

</div>
<div id="help" style="font-size:180%;">
Muuttujat:<hr>
§heart§ - Syke<br><br>
§bright§ - Kirkkaus<br><br>
§steps§ - Askeleet<br><br>
§date§ - PVM<br><br>
§time§ - Aika</div>
<script>
function print_cmd(txt)
{
    var tt = new Date();
    var t = tt.getHours();
    var m = tt.getMinutes();
    var s = tt.getSeconds();
    if(t<10){t="0"+t;}
    if(m<10){m="0"+m;}
    if(s<10){s="0"+s;}
    document.getElementById("cmd").innerHTML= document.getElementById("cmd").innerHTML+""+t+":"+m+":"+s+" - "+txt+"<hr>";
    document.getElementById("cmd").scrollTop = document.getElementById("cmd").scrollHeight;
}

function tyhjaa()
{
    document.getElementById("cmd").innerHTML="";
}

function download()
{
    print_cmd("Ladataan sovellus paikalliseen laitteeseen.");
    let teksti = document.getElementById("codebox").value;
    
    // Määritä säännölliset lausekkeet sovelluksen nimen ja version poimimiseen
var nameRegex = /name='(.*?)'/;
var appVerRegex = /app_ver='(.*?)'/;
let filename="nimeton";
// Etsi merkkijonosta sovelluksen nimi ja versio
var nimiTulos = teksti.match(nameRegex);
var versioTulos = teksti.match(appVerRegex);

// Tarkista, onko tiedot löydetty
if (nimiTulos && versioTulos) {
    var sovelluksenNimi = nimiTulos[1];
    var sovelluksenVersio = versioTulos[1];
    
    console.log("Sovelluksen nimi: " + sovelluksenNimi);
    console.log("Sovelluksen versio: " + sovelluksenVersio);
    filename = sovelluksenNimi+" "+sovelluksenVersio;
    filename = filename.replace(/ /g, "_");
    
    print_cmd("Ladataan tiedostoa "+filename+".jp");
} else {
    print_cmd("Tiedostoa ei voitu nimetä koska tarvittavia tietoja ei ollut.");
    console.log("Tietoja ei löytynyt.");
}
    
    
    
    var blob = new Blob([teksti], { type: "text/plain" });

// Luodaan ankkuri-elementti latausta varten
var a = document.createElement("a");
a.href = URL.createObjectURL(blob);
a.download = filename+".jp"; // Määritetään tiedostonimi

// Simuloidaan klikkaus ankkuri-elementillä
a.click();

// Vapautetaan käytetyt resurssit
URL.revokeObjectURL(a.href);
}

let lcd = document.getElementById("lcd");

let muuttujien_arvot = [];
let muuttujien_nimet = [];

let page = 1;
 let btn_up = [];
    let btn_down = [];
    let sc_right = [];
    let sc_left = [];
    
function komento(cmd)
{
    console.log(cmd);
    if(cmd===false)
    {
        console.log("Komentoa ei ollut määritetty!");
        print_cmd("Komentoa ei määritetty!");
    }
        else
    {
        console.log("KOMENTO:"+cmd);
        print_cmd("SUORITETTIIN KOMENTO: "+cmd);
        if(cmd.includes(","))
        {   //sisältää useita komentoja
                
        }
            else
        {
            if(cmd.includes("exit"))
            {
                print_cmd("Ohjelma suljettiin");
                alusta_aloitusnaytto();
                btn_up = [];
                btn_down = [];
                sc_right = [];
                sc_left = [];
                document.getElementById("btn_up").style.cursor="not-allowed";
                document.getElementById("btn_up").style.opacity="0.1";
                document.getElementById("btn_down").style.cursor="not-allowed";
                document.getElementById("btn_down").style.opacity="0.1";
                document.getElementById("btn_left").style.cursor="not-allowed";
                document.getElementById("btn_left").style.opacity="0.1";
                document.getElementById("btn_right").style.cursor="not-allowed";
                document.getElementById("btn_right").style.opacity="0.1";
            }
                else
            {
                if(cmd.includes("page"))
                {
                    print_cmd("Sivu vaihtui "+page+" > "+ parseInt(cmd.replace("page", "")));
                     let dy = cmd.replace("page", "");
                     if(dy=="+" || dy=="-")
                     {
                         if(dy=="+")
                         {
                            page++; 
                         }
                            else
                        {
                            if(page>0)
                            {
                                page--;
                            }
                        }
                     }
                        else
                    {
                        page=parseInt(dy);
                    }
                    run();
                }
                    else
                {
                    if(cmd.includes("§"))
                    {
                        
                            if(cmd.includes("+") || cmd.includes("-"))
                            {
                                
                                let plus = false;
                                if(cmd.includes("+")){plus=true; cmd = cmd.replace(/\+/g, '');}else{cmd = cmd.replace(/\-/g, '');}
                                let clear_variable=cmd.replace(/§/g, '');
                                let mis = muuttujien_nimet.indexOf(clear_variable);
                                if(mis==-1)
                                {
                                    print_cmd("Muuttujaa ei löytynyt!");
                                }   
                                    else
                                {
                                    if(plus)
                                    {
                                        muuttujien_arvot[mis]++;
                                    }
                                        else
                                    {
                                        muuttujien_arvot[mis]--;
                                    }
                                    run();
                                }   
                            }
                                else
                            {
                                print_cmd("Virheellinen muuttuja komento");
                            }
                        }
                            else
                        {
                            print_cmd("Virheellinen muuttuja komento");
                        }
                    
                }
            }
        }
    }
}
    
function action(btn)  // x= left, right, up, down
{
    if(btn=="left" && sc_left.length > 0)
    {
        komento(sc_left[page-1]);
    }
    if(btn=="right" && sc_right.length > 0)
    {
        komento(sc_right[page-1]);
    }
    if(btn=="up" && btn_up.length > 0)
    {
        komento(btn_up[(page-1)]);
    }
    if(btn=="down" && btn_down.length > 0)
    {
        komento(btn_down[page-1]);
    }
}    
    
function run()
{
    print_cmd("Käännetään koodia..");
     btn_up = [];
     btn_down = [];
     sc_right = [];
     sc_left = [];
    alusta_aloitusnaytto();
    let koodi = document.getElementById("codebox").value;
    let tausta_r =0,tausta_g=0,tausta_b=0;
    

    // Etsi bg_r:n arvo säännöllisen lausekkeen avulla
    /*let match = koodi.match(/bg_r='(\d+)'/);

    if (match) {
        var etsitty = match[1]; // Ensimmäinen säännöllisen lausekkeen ryhmä
        console.log("bg_r: " + etsitty);
        tausta_r=etsitty;
    } 
        else    
    {
        console.log("r arvoa ei löytynyt.");
    }
    
    match = koodi.match(/bg_g='(\d+)'/);

    if (match) {
        var etsitty = match[1]; // Ensimmäinen säännöllisen lausekkeen ryhmä
        console.log("bg_g: " + etsitty);
        tausta_g=etsitty;
    } 
        else    
    {
        console.log("g arvoa ei löytynyt.");
    }
    
    match = koodi.match(/bg_b='(\d+)'/);

    if (match) {
        var etsitty = match[1]; // Ensimmäinen säännöllisen lausekkeen ryhmä
        console.log("bg_b: " + etsitty);
        tausta_b=etsitty;
    } 
        else    
    {
        console.log("b arvoa ei löytynyt.");
    }
    */
   
    
    let match = koodi.match(/objs='(\d+)'/);
    let total_objs=0;
    if (match) {
        var etsitty = match[1]; // Ensimmäinen säännöllisen lausekkeen ryhmä
        console.log("kohteita: " + etsitty);
        total_objs=parseInt(etsitty);
        print_cmd("Objekteja oli määritetty "+total_objs);
    } 
        else    
    {
        console.log("kohteita ei löytynyt.");
        print_cmd("Objekteiden määrä puuttuu!");
    }
    
    match = koodi.match(/pages='(\d+)'/);
    let pages=0;
    if (match) {
        var etsitty = match[1]; // Ensimmäinen säännöllisen lausekkeen ryhmä
        console.log("sivuja: " + etsitty);
        pages=parseInt(etsitty);
        print_cmd("Sivuja oli määritetty "+pages);
    } 
        else    
    {
        print_cmd("Sivu määrä puuttui!");
        console.log("kohteita ei löytynyt.");
    }
    
    match = koodi.match(/vars='(\d+)'/);
    let muuttujat=0;
    if (match) {
        var etsitty = match[1]; // Ensimmäinen säännöllisen lausekkeen ryhmä
        console.log("sivuja: " + etsitty);
        muuttujat=parseInt(etsitty);
        print_cmd("Muuttujia oli määritetty "+muuttujat);
    } 
        else    
    {
        print_cmd("Muuttujien määrä puuttui!");
        console.log("kohteita ei löytynyt.");
    }
    
    let kohta=0;
    
    if(runbtn==true)
    {
        muuttujien_arvot = [];
        muuttujien_nimet = [];
    while(kohta<muuttujat)
    {
        let etsittava = "m"+(kohta+1);
        // Etsi muuttujan ja sen arvon säännöllisellä lausekkeella
        //const muuttujaRegex = /m1\s+§([^§]+)§\s*=\s*'([^']+)'/;
        const muuttujaRegex = new RegExp(`${etsittava}\\s+§([^§]+)§\\s*=\\s*'([^']+)`);

        const matchi = koodi.match(muuttujaRegex);

        if (matchi) 
        {
            
            const muuttujaNimi = matchi[1];
            const muuttujaArvo = matchi[2];
            print_cmd("§"+muuttujaNimi+"§ asetettiin arvoon "+muuttujaArvo);
            
            console.log('Muuttuja:', muuttujaNimi);
            console.log('Arvo:', muuttujaArvo);
            muuttujien_arvot.push(muuttujaArvo);
            muuttujien_nimet.push(muuttujaNimi);
        } 
            else 
        {
            console.log('Muuttujaa ei löytynyt koodista.');
        }
        kohta++;
    }
    }
    
    let data = koodi;
    kohta = 0;
    while(kohta<total_objs)
    {
        var startIndex = data.indexOf("o"+(kohta+1)+"{");
        if (startIndex !== -1) 
        {
            var endIndex = data.indexOf("}", startIndex);
            if (endIndex !== -1) 
            {
                var o2Text = data.substring(startIndex, endIndex + 1);
                var keyValuePairs = o2Text.match(/\w+='[^']+'/g);
                var object = {};
                if (keyValuePairs) 
                {
                    keyValuePairs.forEach(function(keyValue) 
                    {
                        var parts = keyValue.split('=');
                        var key = parts[0].trim();
                        var value = parts[1].trim().replace(/'/g, ''); // Poista ylimääräiset yksittäiset lainausmerkit
                        object[key] = value;
                    });
                    console.log(object.type); // Tulostaa 'text'
                    
                    //Lets create shit
                    let txt =object.v;
                    let ehto=false;
                    
                    if(object.if==undefined || object.var==undefined)
                    {
                        ehto=true;
                    }
                        else
                    {
                       
                                
                                if(object.var.includes("§"))
                                {
                                    
                                    let clear_variable=object.var.replace(/§/g, '');
                                    let mis = muuttujien_nimet.indexOf(clear_variable);
                                    if(mis==-1)
                                    {
                                        print_cmd("Muuttujaa ei löytynyt o"+(kohta+1)+" ehtoon.");
                                    }   
                                        else
                                    {
                                        if(String(muuttujien_arvot[mis]) === String(object.if))
                                        {
                                            
                                            ehto = true;
                                        }
                                    }
                                }
                    }
                    
                    if(object.type=="text" && ehto==true)
                    {
                        if(object.p==page || object.p==0)
                        {
                        let obj = document.createElement("p");
                        
                        let variable = object.v;
                        
                            if(object.v==="§heart§" || object.v==="§bright§" || object.v==="§steps§" || object.v==="§date§" || object.v==="§time§"){}else
                            {
                                if(variable.includes("§"))
                                {
                                    let clear_variable=variable.replace(/§/g, '');
                                    let mis = muuttujien_nimet.indexOf(clear_variable);
                                    if(mis==-1)
                                    {
                                        txt="?";
                                    }   
                                        else
                                    {
                                        txt=muuttujien_arvot[mis];
                                    }
                                }
                            }
                        if(object.v==="§heart§")
                        {
                            let syke = Math.floor(Math.random() * (120 - 60 + 1)) + 60;
                            txt=syke;
                            print_cmd("Ohjelma käyttää syketietoa!");
                        }
                        
                        if(object.v==="§bright§")
                        {
                            let kirkkaus = Math.floor(Math.random() * (100 + 1));
                            txt=kirkkaus;
                            print_cmd("Ohjelma käyttää kirkkaustietoa!");
                        }
                        
                        if(object.v==="§steps§")
                        {
                            let askeleet = Math.floor(Math.random() * (5000 + 100))+100;
                            txt=askeleet;
                            print_cmd("Ohjelma käyttää askeltietoa!");
                        }
                        
                        if(object.v==="§date§" || object.v==="§time§")
                        {
                            var nyt = new Date();
                            
                            
                            if(object.v==="§date§")
                            {
                                print_cmd("Ohjelma käyttää päiväystietoa!");
                                // Hae päivä, kuukausi ja vuosi
                                var paiva = nyt.getDate();
                                var kuukausi = nyt.getMonth() + 1; // Huomaa, että kuukaudet alkavat 0:sta, joten lisää 1
                                var vuosi = nyt.getFullYear();
                                txt = paiva+"."+kuukausi+"."+vuosi;
                            }
                            
                            if(object.v==="§time§")
                            {
                                print_cmd("Ohjelma käyttää aikatietoa!");
                                // Hae tunnit ja minuutit
                                var tunnit = nyt.getHours();
                                var minuutit = nyt.getMinutes();

                                // Lisää etunollat, jos tarpeen
                                if (tunnit < 10) 
                                {
                                    tunnit = "0" + tunnit;
                                }

                                if (minuutit < 10) 
                                {
                                    minuutit = "0" + minuutit;
                                }
                                    // Muodosta aika merkkijonoksi (esimerkiksi "21:00")
                                txt = tunnit + ":" + minuutit;
                            }
                    }
                        let sisalto = document.createTextNode(txt);
                        obj.style.position="absolute";
                        obj.style.left=object.x+"px";
                        obj.style.top=object.y+"px";
                        
                        obj.style.fontSize=object.s+"px";
                        obj.style.color = "rgb(" + object.r + "," + object.g + "," + object.b + ")";
                        obj.appendChild(sisalto);
                        lcd.appendChild(obj);
                    }
                    }
                    
                    
                    
                    
                    if(object.type=="box" && ehto == true)
                    {
                        if(object.p==page || object.p==0)
                        {
                        let obj = document.createElement("div");
                        obj.style.position="absolute";
                        obj.style.left=object.x+"px";
                        obj.style.width=object.w;
                        obj.style.height=object.h;
                        obj.style.top=object.y+"px";
                        obj.style.backgroundColor = "rgb(" + object.r + "," + object.g + "," + object.b + ")";
                        lcd.appendChild(obj);
                        }
                    }
                    
                } 
                    else 
                {
                    console.log("'o"+(kohta+1)+"' ei löytynyt tekstistä.");
                    print_cmd("Objektia o"+(kohta+1)+" määritystä ei löytynyt!");
                }
            }
        } 
            else 
        {
            console.log("'o"+(kohta+1)+"' ei löytynyt tekstistä.");
            print_cmd("Objektia o"+(kohta+1)+" määritystä ei löytynyt!");
        }
        kohta++;
    } // objektit päättyyy
    
     kohta = 0;
    while(kohta<pages)
    {
        var startIndex = data.indexOf("p"+(kohta+1)+"{");
        if (startIndex !== -1) 
        {
            var endIndex = data.indexOf("}", startIndex);
            if (endIndex !== -1) 
            {
                var o2Text = data.substring(startIndex, endIndex + 1);
                var keyValuePairs = o2Text.match(/\w+='[^']+'/g);
                var object = {};
                if (keyValuePairs) 
                {
                    keyValuePairs.forEach(function(keyValue) 
                    {
                        var parts = keyValue.split('=');
                        var key = parts[0].trim();
                        var value = parts[1].trim().replace(/'/g, ''); // Poista ylimääräiset yksittäiset lainausmerkit
                        object[key] = value;
                    });
                    if(kohta==(page-1)) //jos ollaan ekalla sivulla
                    {
                        tausta_r=object.r;
                        tausta_g=object.g;
                        tausta_b=object.b;
                    }
                    //Lets create shit
                        if(object.bt_up===undefined){btn_up.push(false);}else{btn_up.push(object.bt_up);}
                         if(object.bt_dn===undefined){btn_down.push(false);}else{btn_down.push(object.bt_dn);}
                          if(object.sr_rt===undefined){sc_right.push(false);}else{sc_right.push(object.sr_rt);}
                           if(object.sr_lt===undefined){sc_left.push(false);}else{sc_left.push(object.sr_lt);}
                       
                } 
                    else 
                {
                    console.log("'p"+(kohta+1)+"' ei löytynyt tekstistä.");
                    print_cmd("Sivun 'p"+(kohta+1)+"' määritystä ei löytynyt.");
                }
            }
        } 
            else 
        {
            console.log("'p"+(kohta+1)+"' ei löytynyt tekstistä.");
            print_cmd("Sivun 'p"+(kohta+1)+"' määritystä ei löytynyt.");
        }
        kohta++;
    }
    
    if(btn_up[(page-1)]==false)
    {
        document.getElementById("btn_up").style.cursor="not-allowed";
        document.getElementById("btn_up").style.opacity="0.1";
    }
        else
    {
        document.getElementById("btn_up").style.cursor="pointer";
        document.getElementById("btn_up").style.opacity="1";
    }
    
    if(btn_down[(page-1)]==false)
    {
        document.getElementById("btn_down").style.cursor="not-allowed";
        document.getElementById("btn_down").style.opacity="0.1";
    }
        else
    {
        document.getElementById("btn_down").style.cursor="pointer";
        document.getElementById("btn_down").style.opacity="1";
    }
    
    if(sc_right[(page-1)]==false)
    {
        document.getElementById("btn_right").style.cursor="not-allowed";
        document.getElementById("btn_right").style.opacity="0.1";
    }
        else
    {
        document.getElementById("btn_right").style.cursor="pointer";
        document.getElementById("btn_right").style.opacity="1";
    }
    
    if(sc_left[(page-1)]==false)
    {
        document.getElementById("btn_left").style.cursor="not-allowed";
        document.getElementById("btn_left").style.opacity="0.1";
    }
        else
    {
        document.getElementById("btn_left").style.cursor="pointer";
        document.getElementById("btn_left").style.opacity="1";
    }
    
    
    
    lcd.style.backgroundColor = "rgb(" + tausta_r + "," + tausta_g + "," + tausta_b + ")";
    runbtn=false;
}

let runbtn=true;
let dir = 0;
let steps=0;
let enable_btns=false;
function use_button(x)
{
    if(x==0)
    {
        if(steps==0)
        {
            rotate_right_loop();
        }
    }
    if(x==1)
    {
        if(steps==0)
        {
            rotate_left_loop();
        }
    }
    if(x==2)
    {
        action("down");
    }
    if(x==3)
    {
        action("up");
    }
}

function rotate_left_loop()
{
    if(steps<25)
    {
        if(dir<359)
        {
            dir++;    
        }
            else
        {
            dir=0;
        }
        steps++;
        document.getElementById("keha").style.transform       = 'rotate('+dir+'deg)'; 
        setTimeout(rotate_left_loop,10);
    }
        else
    {
        steps=0;
        action("right");
    }
    //console.log(dir+" "+steps);
}

function rotate_right_loop()
{
    if(steps<25)
    {
        if(dir>1)
        {
            dir--;    
        }
            else
        {
            dir=360;
        }
        steps++;
        document.getElementById("keha").style.transform       = 'rotate('+dir+'deg)'; 
        setTimeout(rotate_right_loop,10);
    }
        else
    {
        steps=0;
        action("left");
    }
   // console.log(dir+" "+steps);
}


function odota(functio,aika)
{
    setTimeout(functio,aika);
}




function start_screen()
{
    lcd.style.backgroundColor="white";
    print_cmd("Käynistetään virtuaalista käyttöjärjestelmää.");
    let obj = document.createElement("h2");
    let sisalto = document.createTextNode("Jyrki OS");
    obj.style.position="absolute";
    obj.style.left="75px";
    obj.style.top="110px";
    obj.appendChild(sisalto);
    lcd.appendChild(obj);
    
    obj = document.createElement("p");
    sisalto = document.createTextNode("Valmistellaan..");
    obj.style.position="absolute";
    obj.style.left="75px";
    obj.style.top="150px";
    obj.id="infotxt";
    obj.appendChild(sisalto);
    lcd.appendChild(obj);

    obj = document.createElement("img");
    obj.style.position="absolute";
    obj.style.left="85px";
    obj.style.top="45px";
    obj.src="jyrkios2.png";
    lcd.appendChild(obj);
    odota(alusta_aloitusnaytto,1000);
    odota(run,1000);
}
odota(start_screen,1000);

function alusta_aloitusnaytto()
{
    print_cmd("Näyttö alustettu!")
    lcd.style.backgroundColor="black";
    lcd.innerHTML="";
}



document.addEventListener("DOMContentLoaded", function() {
            var fileInput = document.getElementById("fileInput");
            var lueTiedostoButton = document.getElementById("lueTiedosto");

            lueTiedostoButton.addEventListener("click", function() {
                fileInput.click(); // Käynnistetään tiedoston valinta klikkaamalla piilotettua input-kenttää
            });

            fileInput.addEventListener("change", function(event) {
                var tiedosto = event.target.files[0];
                if (tiedosto) {
                    lueJaKasitteleTiedosto(tiedosto);
                }
            });

            
        });
 

function lueJaKasitteleTiedosto(tiedosto) {
    console.log(tiedosto);
                var lukija = new FileReader();

                lukija.onload = function(event) {
                    var tiedostonSisalto = event.target.result;
                    //console.log("Tiedoston sisältö:\n", tiedostonSisalto);

                    // Voit tallentaa sisällön string-muuttujaan tarvittaessa
                    var sisaltoStringina = tiedostonSisalto.toString();
                    document.getElementById("codebox").value=sisaltoStringina;
                    alusta_aloitusnaytto();
                    page=1;
                    run();
                    console.log("Tiedoston sisältö string-muuttujassa:\n", sisaltoStringina);
                };

                lukija.readAsText(tiedosto);
            }
            
            function lataa_automaattisesti_paikallinen(tiedostonSijainti) {
    fetch(tiedostonSijainti)
        .then(response => response.text())
        .then(data => {
            // Käsittele tiedoston sisältöä tässä
            console.log("Tiedoston sisältö:", data);
        })
        .catch(error => {
            // Käsittele virheitä tässä
            console.error('Tiedoston lataaminen epäonnistui:', error);
        });
}
 
</script>
<!--<script type="text/javascript" src="kellon_os.js"></script>-->
