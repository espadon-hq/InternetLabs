console.log("Surname: Shimanskyi, Firstname: Vitaliy");

class Book {
    constructor(title, author, publicationYear) {
        this.title = title;
        this.author = author;
        this.publicationYear = publicationYear;
    }

    getInformation() {
        return `Title: ${this.title}, Author: ${this.author}, Publication year: ${this.publicationYear}`;
    }

    static getBookAge(publicationYear) {
        const currentYear = new Date().getFullYear();
        return currentYear - publicationYear;
    }
}

const book1 = new Book("The Art of War", "Sun Tzu", 2008);
console.log(book1.getInformation());

const book2 = new Book("1984", "George Orwell", 1949);
const book2Age = Book.getBookAge(book2.publicationYear);
console.log(`The age of the book '${book2.title}': ${book2Age} years`);
