const students = [
    { lastName: 'Старк', firstName: 'Еддард' },
    { lastName: 'Ланністер', firstName: 'Тайвін' },
    { lastName: 'Таргарієн', firstName: 'Дейенеріс' },
    { lastName: 'Сноу', firstName: 'Джон' },
    { lastName: 'Грейджой', firstName: 'Теон' },
    { lastName: 'Баратеон', firstName: 'Роберт' },
    { lastName: 'Аррен', firstName: 'Джон' },
    { lastName: 'Таллі', firstName: 'Кейтлін' }
];

let swapped;
do {
    swapped = false;
    for (let i = 0; i < students.length - 1; i++) {
        if (students[i].lastName > students[i + 1].lastName || 
            (students[i].lastName === students[i + 1].lastName && students[i].firstName > students[i + 1].firstName)) {
            [students[i], students[i + 1]] = [students[i + 1], students[i]];
            swapped = true;
        }
    }
} while (swapped);

students.forEach(s => console.log(s.lastName + ' ' + s.firstName));
