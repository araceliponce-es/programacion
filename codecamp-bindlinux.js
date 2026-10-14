let doors = new Array(numDoors);
console.log({ doors })
for (let index = 0; index < numDoors; index++) {
  const element = array[index];

}




// The wind strewed leaves on the street


// console.log("Hello! I'm your coding fun fact guide!")
// let botName, botLocation, favoriteLanguage;
// botName = 'pepito'
// botLocation = 'la nube'
// favoriteLanguage = 'spanish'

// console.log(`My name is ${botName} and I live on ${botLocation}.`)

// console.log(`My favorite programming language is ${favoriteLanguage}.`)
// let codingFact = favoriteLanguage + "is boring"
// console.log(codingFact)

// codingFact = favoriteLanguage + "starts with s"
// console.log(codingFact)


// codingFact = favoriteLanguage + "ends with ish"
// console.log(codingFact)

// console.log(`It was fun sharing these facts with you. Goodbye! - ${botName} from ${botLocation}.`)


// let adjective, noun, verb, place, adjective2, noun2;

// noun = 'plusle'
// noun2 = 'bread'
// adjective = 'cold'
// adjective2 = 'warm'
// verb = 'play'
// place = 'sky'

// let firstStory = `Once upon a time, there was a(n) ${adjective} ${noun} who loved to eat ${noun2}. The ${noun} lived in a ${place} and had ${adjective2} nostrils that blew fire when it was ${verb}.`


// console.log(`First story: ${firstStory}`)

// adjective = 'pink'
// noun = 'dog'
// verb = 'howls'
// place = 'house'
// adjective2 = 'funnily'
// noun2 = 'chicken'
// let secondStory = `Once upon a time, there was a(n) ${adjective} ${noun} who loved to eat ${noun2}. The ${noun} lived in a ${place} and had ${adjective2} nostrils that blew fire when it was ${verb}.`


// console.log(`Second story: ${secondStory}`)







console.log("Hi there!");

const botName = "teacherBot";

const greeting = `My name is ${botName}.`;
console.log(greeting);

const subject = "JavaScript";
const topic = "strings";

const sentence = `Today, you will learn about ${topic} in ${subject}.`;
console.log(sentence);
let strLengthIntro = `Here is an example of using the length property on the word ${subject}.`
console.log(strLengthIntro)

console.log(strLengthIntro.length);




console.log(`Here is an example of accessing the first letter in the word ${subject}.`)
console.log(lastCharacter)




















  // this is on / etc / bind / db.ejemplo.local

  $TTL  3600
@IN        SOA   ns1.ejemplo.local.tic.ejemplo.local. (
  2019070401 ; its the serial Number
900; refresh
600; retry
86400; expire
3600      ); negative cache ttl
            IN        NS    ns1.ejemplo.local.
            IN        MX    10  mailserver1.ejemplo.local.
            IN        MX    10  mailserver2.ejemplo.local.
  _telnet._tcp  IN      SRV   0  0   23   pc1.ejemplo.local.   
ns1         IN        A     172.16.0.4
mailserver1 IN        A     172.16.0.6
mailserver2 IN        A     172.16.0.7

// means:
// The DNS server responsible for ejemplo.local is ns1.ejemplo.local.
// ns1.ejemplo.local has IP 172.16.0.4


// The Telnet service over TCP is available on pc1.ejemplo.local, using port 23.

// If you want to send email to @ejemplo.local, use these mail servers.mailserver1.ejemplo.local y mailserver2.ejemplo.local (ambos tienen la prioridad 10, ...0 o 1 es la prioridad mas alta)