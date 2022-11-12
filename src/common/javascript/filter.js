function applyFilter(field, value) {
    constructedUrl = window.location.href;
    console.log("Field: " + field);
    console.log("Value: " + value);

    regex = new RegExp("((ordered)|(" + field + "))(=)([^&]*)&*", "g");
    console.log("Regex: " + regex);
    url = constructedUrl.replace(regex, "");

    window.location = url + (value != '' ? (url.includes("?") ? "&" : "?") + field + "=" + value : '');
}