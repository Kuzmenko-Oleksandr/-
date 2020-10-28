var innerArray1 = document.getElementById("array1"); 
var innerArray2 = document.getElementById("array2");
var sortedArray = document.getElementById("array_sorted");
var max = document.getElementById("max");

function makeArray() { 
    var size = parseInt(document.getElementById("size").value);
    document.getElementById("size").innerHTML = size;
    
    var arrayA = Array.from({ 
        length: size 
    }, () => Math.floor(Math.random() * 10));
    innerArray1.innerHTML = arrayA.join(",   ");
    var maxOfArray = arrayMax(arrayA);
    max.innerHTML = maxOfArray;
    var arrayB = arrayA.map(value => value * maxOfArray);
    innerArray2.innerHTML = arrayB.join(",   ");
    sortedArray.innerHTML = insertionSort(arrayB).join(",   ");
} 

function arrayMax(arr) {
    var len = arr.length, max = -Infinity;
    while (len--) {
      if (arr[len] > max) {
        max = arr[len];
      }
    }
    return max;
};

function insertionSort(inputArr) {
  let n = inputArr.length;
      for (let i = 1; i < n; i++) {
          let current = inputArr[i];
          let j = i-1; 
          while ((j > -1) && (current > inputArr[j])) {
              inputArr[j+1] = inputArr[j];
              j--;
          }
          inputArr[j+1] = current;
      }
  return inputArr;
}

var op;
  function func() {
    var result;
    var num1 = Number(document.getElementById("num1").value);
    var num2 = Number(document.getElementById("num2").value);
    switch (op) {
      case '+':
        result = num1 + num2;
        break;
      case '-':
        result = num1 - num2;
        break;
      case '*':
        result = num1 * num2;
        break;
      case '^':
        result = num1 ** num2;
        break;
      case '/':
        if (num2) {
          result = num1 / num2;
        } else {
          result = 'бесконечность';
        }
        break;
      default:
        result = 'выберите операцию';
    }

    document.getElementById("result").innerHTML = result;
}
var words = ["Аватар","Леон","Сумерки","1917","Дедпул","Avatar","Leon","Twilight","Deadpool"];
autocomplete(document.getElementById("myInput"), words);

function autocomplete(inp, arr) {
    var currentFocus;
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        for (i = 0; i < arr.length; i++) {
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                b = document.createElement("DIV");
                b.innerHTML =  "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                b.addEventListener("click", function(e) {
                    inp.value = this.getElementsByTagName("input")[0].value;
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });

    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            currentFocus++;
            addActive(x);
        } else if (e.keyCode == 38) {
            currentFocus--;
            addActive(x);
        } else if (e.keyCode == 13) {
            e.preventDefault();
            if (currentFocus > -1) {
                if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        if (!x) return false;
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}

function buttonPre(){
    var items = [93, 44, 28, 87, 68, 20, 75, 47, 66, 22, 85, 23, 14, 11, 78, 98, 33, 69, 5, 12];
    function loveTheThrees(array1) {
        var threes = [];
        for (var i = 0; i < array1.length; i++) {
            if (array1[i] % 2 === 0 ) {
                threes.push(array1[i]);
            }
        }
        return threes;
    }
    function loveTheThrees2(array2) {
        var threes2 = [];
        for (var i = 0; i < array2.length; i++) {
            if (array2[i] % 3 === 0 && array2[i] % 2 === 0 ) {
                threes2.push(array2[i]);
            }
        }
        return threes2;
    }
    function loveTheThrees3(array3) {
        var threes3 = [];
        for (var i = 0; i < array3.length; i++) {
            if (array3[i] % 3 === 0 ) {
                threes3.push(array3[i]);
            }
        }
        return threes3;
    }
    result5 = (items) + " - изначальный массив";
    document.getElementById("result5").innerHTML = result5;

    // alert(loveTheThrees(items) + " - числа которые деляться на 2.  " + loveTheThrees2(items) + " - числа которые деляться на 2 и 3. " + loveTheThrees3(items) + " - числа которые деляться на 3.");
    result1 = loveTheThrees(items) + " - числа которые деляться на 2. " ;
    result2 = loveTheThrees2(items) + " - числа которые деляться на 2 и 3. ";
    result3 = loveTheThrees3(items) + " - числа которые деляться на 3.";
    document.getElementById("result1").innerHTML = result1;
    document.getElementById("result2").innerHTML = result2;
    document.getElementById("result3").innerHTML = result3;

}
var items = [93, 44, 28, 87, 68, 20, 75, 47, 66, 22, 85, 23, 14, 11, 78, 98, 33, 69, 5, 12];
function swap(items, firstIndex, secondIndex){
    const temp = items[firstIndex];
    items[firstIndex] = items[secondIndex];
    items[secondIndex] = temp;
}
function partition(items, left, right) {
    var pivot   = items[Math.floor((right + left) / 2)],
        i       = left,
        j       = right;
    while (i <= j) {
        while (items[i] < pivot) {
            i++;
        }
        while (items[j] > pivot) {
            j--;
        }
        if (i <= j) {
            swap(items, i, j);
            i++;
            j--;
        }
    }
    return i;
}
function quickSort(items, left, right) {
    var index;
    if (items.length > 1) {
        index = partition(items, left, right);
        if (left < index - 1) {
            quickSort(items, left, index - 1);
        }
        if (index < right) {
            quickSort(items, index, right);
        }
    }
    return items;
}
result4 = "QuickSort - " + quickSort(items, 0, items.length - 1);
document.getElementById("result4").innerHTML = result4;
var div = document.getElementById('myLink');
var e    = document.createElement('a');
e.href = 'http://google.ru';
e.title = 'это ссылка';
e.appendChild(document.createTextNode(' google'));
div.appendChild(e);

var text = 'some';





