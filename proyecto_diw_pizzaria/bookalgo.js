
let books = [
  {
    title: 'aaaaa',
    authorName: 'a',
    releaseYear: 1998
  },
  {
    title: 'bbb',
    authorName: 'b',
    releaseYear: 1950
  },
  {
    title: 'ccc',
    authorName: 'c',
    releaseYear: 1991
  }
]



let filteredBooks = books.filter(book => book.releaseYear <= 1950)



// Your sortByYear function should return -1 if the releaseYear of book1 object is smaller than that of the book2 object, 1 if the releaseYear of book1 object is larger than that of the book2 object, and 0 in all other scenarios.
function sortByYear(book1, book2) {
  // const arraycreado = [book1, book2]
  // si book1[key] es mayor entonces retorna 1
  // arraycreado.sort((book1, book2) => book1.releaseYear - book2.releaseYear);

  return book1.releaseYear != book2.releaseYear ? book1.releaseYear > book2.releaseYear ? 1 : -1 : 0;
}
console.log(sortByYear(books[0], books[2]))






let arreglo = ['papas', 'patatas', 'camotes'];

console.log((arreglo.join(", ")));
