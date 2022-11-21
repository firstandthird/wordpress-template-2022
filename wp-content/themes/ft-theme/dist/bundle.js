function addAttrs(selector, attrs) {
    if (Array.isArray(selector)) return selector.forEach(function(item) {
        return addAttrs(item, attrs);
    });
    var els = find(selector);
    if (els.length) els.forEach(function(item) {
        Object.keys(attrs).forEach(function(attr) {
            if (attr in item) item[attr] = attrs[attr];
            else item.dataset[attr] = attrs[attr];
        });
    });
    return els;
}
export { addAttrs as default };
