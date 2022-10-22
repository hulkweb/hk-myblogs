

const URL = document.getElementById("URL");
const FILE = document.getElementById("FILE");
const title = document.getElementById("title");
const slug = document.getElementById("slug");

function checkType(type) {
    if (type == 'URL') {
        URL.style.display = "block";
        FILE.style.display = "none";
    } else {
        URL.style.display = "none";
        FILE.style.display = "block";
    }
}

function genrateSlug(val) {
    var val = trim(val);
    var pointer = 0;
    var last = 0;
    for (var s = 0; s < val.length; s++) {
        if (val[s] == ' ' || val[s] == "|") {
            pointer++;

            if (pointer == 4) {
                break;
            }
        }
    }
    val = val.slice(0, s);
    val = val.replace(" ", "-");
    slug.value = val;
}