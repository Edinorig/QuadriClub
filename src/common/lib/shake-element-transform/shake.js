$.fn.shake = function (interval = 100) {
    this.addClass('shaking');
    this.css('transition', 'all ' + (interval / 100).toString() + 's');
    setTimeout(() => {
        this.css('transform', 'translateX(-30%)');
    }, interval * 0);
    setTimeout(() => {
        this.css('transform', 'translateX(25%)');
    }, interval * 1);
    setTimeout(() => {
        this.css('transform', 'translateX(-20%)');
    }, interval * 2);
    setTimeout(() => {
        this.css('transform', 'translateX(15%)');
    }, interval * 3);
    setTimeout(() => {
        this.css('transform', 'translateX(-5%)');
    }, interval * 4);
    setTimeout(() => {
        this.css('transform', 'translateX(0%)');
    }, interval * 5);
    this.removeClass('shaking');
};