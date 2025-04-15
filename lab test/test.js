// test.js
const { expect } = require('chai');

function computeD(v) {
    return 7 * v - Math.log(Math.abs(5 * v)) - (2 + v) / (3 * Math.pow(v, 4) + 3);
}

function computeW(v, t) {
    return 8 * t - Math.sin(Math.pow(t, 2) + 4 * v) + Math.exp(v);
}

describe('Формули обчислень', () => {
    it('Правильно обчислює значення d при v = 2', () => {
        const result = computeD(2);
        expect(result.toFixed(4)).to.equal('13.3691');
    });

    it('Правильно обчислює значення w при v = 1, t = 2', () => {
        const result = computeW(1, 2);
        expect(result.toFixed(4)).to.equal('18.3427');
    });
});
