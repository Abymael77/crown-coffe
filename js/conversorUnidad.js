/*
function alerta(a, b){
    alert("hola0");
    var c = a+b;
    console.log("hola 1 = " + c);
    return c;
}

/*
console.log("Convertir Unidades de medida");
var unidad = "masa" // tipo de unidad masa, volumen, unidad
var pCant = 1;      // cantidad existente en inventario en la BD
var pMedida = "kg";  // unidad de medida del ingrediente kg, mg, lb, oz, etc.
var resCant = 1;    // cantidad para restara existencias
var resMedida = "lb";   // unidad de medida del descuento kg, mg, lb, oz, etc.
descInv(pCant, pMedida, resCant, resMedida, unidad); */

// Libra        lb  0.0022046 g
// onza         oz  0.035274 g
// Kilogramo	kg	1000 g
// Hectógramo	hg	100 g
// Decagramo	dag	10 g
// Gramo	    g	1 g
// Decigramo	dg	0,1 g
// Centigramo	cg	0,01 g
// Miligramo	mg	0,001 g

function conv(parametros){
    //var mydata = JSON.parse(parametros);

    console.log("Convertir Unidades de medida");
    var unidad = mydata[0].unidad; // tipo de unidad masa, volumen, unidad
    var pCant = mydata[0].pCant;      // cantidad existente en inventario en la BD
    var pMedida = mydata[0].pMedida;  // unidad de medida del ingrediente kg, mg, lb, oz, etc.
    var resCant = mydata[0].resCant;    // cantidad para restara existencias
    var resMedida = mydata[0].resMedida;   // unidad de medida del descuento kg, mg, lb, oz, etc.
    var des = descInv(pCant, pMedida, resCant, resMedida, unidad);

    return des;

}

function descInv(pCant, pMedida, resCant, resMedida, unidad){
    var resultado = 0;

    if(unidad == "masa"){
        let prod = conversorMasa(pCant, pMedida);
        console.log("---------------------------------");
        let resta = conversorMasa(resCant, resMedida);

        if(resta > prod){
            console.log("No hay suficiente producto en inventario");
            console.log(-1);
            return -1;
        }else{
            let resGramos = prod-resta;
            console.log(prod +" - " + resta);
            console.log(roundToTwo(resGramos));
            let res = reversaMasa(resGramos, pMedida);
            console.log(roundToTwo(res));

            let retorno = roundToTwo(res);
            return retorno;
            
        }
    }

    if(unidad == "volumen"){
        let vol_prod = conversorVolumen(pCant, pMedida);
        console.log("---------------------------------");
        let vol_resta = conversorVolumen(resCant, resMedida);

        if(vol_resta > vol_prod){
            console.log("No hay suficiente producto en inventario");
            console.log(-1);
            return -1;
        }else{
            console.log("---------------Resta de Volumen-------------------------");
            let resLitro = vol_prod-vol_resta;
            console.log(vol_prod +" - " + vol_resta);
            console.log(roundToTwo(resLitro));
            let v_res = reversaVolumen(resLitro, pMedida);
            console.log(roundToTwo(v_res));
            
            let v_retorno = roundToTwo(v_res);
            return v_retorno;
        }
    }

    if(unidad == "unidad"){
        if(resCant > pCant){
            console.log("No hay suficiente producto en inventario");
            console.log(-1);
            return -1;
        }else{
            console.log("---------------Resta de unidad-------------------------");
            let resuni = pCant - resCant;
            console.log(pCant + " - " + resCant);
            console.log(" = " + resuni);
            return resuni;
        }
    }
}

//convertir valor a gramos
function conversorMasa(valor, simbolo){

    if(simbolo=="lb"){
        console.log("unidad de medida = "+simbolo);
        g = valor / 0.0022046;
        console.log(valor+" "+simbolo+" = "+roundToTwo(g)+" gr");
        return g;
    }
    if(simbolo=="oz"){
        console.log("unidad de medida = "+simbolo);
        g = valor / 0.035274;
        console.log(valor+" "+simbolo+" = "+roundToTwo(g)+" g");
        return g;
    }
    if(simbolo=="kg"){
        console.log("unidad de medida = "+simbolo);
        g = valor * 1000;
        console.log(valor+" "+simbolo+" = "+roundToTwo(g)+" g");
        return g;
    } 
    if(simbolo=="hg"){
        console.log("unidad de medida = "+simbolo);
        g = valor * 100;
        console.log(valor+" "+simbolo+" = "+roundToTwo(g)+" g");
        return g;
    } 
    if(simbolo=="dag"){
        console.log("unidad de medida = "+simbolo);
        g = valor * 10;
        console.log(valor+" "+simbolo+" = "+roundToTwo(g)+" g");
        return g;
    } 
    if(simbolo == "g"){
        console.log("unidad de medida = " + simbolo);
        console.log(valor+" "+simbolo+" = "+roundToTwo(valor)+" g");
        return valor;
    }
    if(simbolo=="dg"){
        console.log("unidad de medida = "+simbolo);
        g = valor * 0.1;
        console.log(valor+" "+simbolo+" = "+roundToTwo(g)+" g");
        return g;
    } 
    if(simbolo=="cg"){
        console.log("unidad de medida = "+simbolo);
        g = valor * 0.01;
        console.log(valor+" "+simbolo+" = "+roundToTwo(g)+" g");
        return g;
    } 
    if(simbolo=="mg"){
        console.log("unidad de medida = "+simbolo);
        g = valor * 0.001;
        console.log(valor+" "+simbolo+" = "+roundToTwo(g)+" g");
        return g;
    } 
    return "no";
}

//convertir valor a unidad original
function reversaMasa(valor, simbolo){
    console.log("////////////**************//////////");
    if(simbolo=="lb"){
        console.log("retornando libras");
        lb = valor * 0.0022046;
        return lb;
    }
    if(simbolo=="oz"){
        console.log("retornando onzas");
        oz = valor * 0.035274;
        return oz;
    }
    if(simbolo=="kg"){
        console.log("retornando kilogramos");
        kg = valor / 1000;
        return kg;
    }
    if(simbolo=="hg"){
        console.log("retornando Hectogramos");
        hg = valor / 100;
        return hg;
    }
    if(simbolo=="dag"){
        console.log("retornando Decagramos");
        dag = valor / 10;
        return dag;
    }
    if(simbolo == "g"){
        console.log("retornando gramos");
        return valor;
    }
    if(simbolo=="dg"){
        console.log("retornando Decigramos");
        dg = valor * 0.1;
        return dg;
    }
    if(simbolo=="cg"){
        console.log("retornando centigramos");
        cg = valor * 0.01;
        return cg;
    }
    if(simbolo=="mg"){
        console.log("retornando miligramos");
        mg = valor * 0.001;
        return mg;
    }
}

//convertir valor a litros
function conversorVolumen(valor, simbolo){
    if(simbolo=="gl"){
        console.log("unidad de medida = "+simbolo);
        l = valor * 3.785;
        console.log(valor+" "+simbolo+" = "+roundToTwo(l)+" l");
        return l;
    }
    if(simbolo=="l"){
        console.log("unidad de medida = "+simbolo);
        console.log(valor+" "+simbolo+" = "+roundToTwo(valor)+" l");
        return valor;
    }
    if(simbolo=="ml"){
        console.log("unidad de medida = "+simbolo);
        l = valor / 1000;
        console.log(valor+" "+simbolo+" = "+roundToTwo(l)+" l");
        return l;
    }
}

//convertir valor a unidad original
function reversaVolumen(valor, simbolo){
    console.log("////////////**************//////////");
    if(simbolo=="gl"){
        console.log("retornando Galon");
        gl = valor / 3.785;
        return gl;
    }
    if(simbolo=="l"){
        console.log("retornando Litro");
        return valor;
    }
    if(simbolo=="ml"){
        console.log("retornando Mililitros");
        ml = valor * 1000;
        return ml;
    }
}
//aproximar decimales
function roundToTwo(num) {
    return +(Math.round(num + "e+4")  + "e-4");
}
