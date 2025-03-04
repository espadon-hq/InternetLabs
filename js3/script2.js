const surname = "Shimanskyi";
const firstName = "Vitaliy";

const displayStudentName = ((fullName => {
    return () => {
        [...fullName].forEach(letter => console.log(letter));
    };
})(surname + ' ' + firstName));

displayStudentName();
