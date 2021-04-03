
const val_algorithm = (string)=>{
    if (string.includes('~') == true || string.includes('!') == true || string.includes('@') == true || string.includes('#') == true || 
    string.includes('$') == true || string.includes('%') == true || string.includes('^') == true || string.includes('&') == true || 
    string.includes('*') == true || string.includes('(') == true || string.includes(')') == true || string.includes('<') == true || 
    string.includes('>') == true || string.includes('?') == true  || string.includes('/') == true || string.includes(',') == true || string.includes('.') == true
    || string.includes('"') == true  || string.includes('\'') == true  || string.includes(';') == true || string.includes(':') == true || string.includes('[') == true || string.includes(']') == true
    || string.includes('{') == true || string.includes('}') == true || string.includes('-') == true || string.includes('_') == true || string.includes('+') == true || string.includes('=') == true || string.includes('`') == true
    || string.includes('\\') == true || string.includes('|') == true || string.includes('0') == true || string.includes('1') == true || string.includes('2') == true || string.includes('3') == true || 
    string.includes('4') == true || string.includes('5') == true || string.includes('6') == true || string.includes('7') == true || 
    string.includes('8') == true || string.includes('9') == true) {
        return true;
    }else{
        return false;
    }
}
const  val = {
    string_val : (string)=>{
            if (val_algorithm(string) == true) {
                return false;
            }else{
                return true;
            }
    },
    number_val : (string)=>{
        if (string.includes('~') == true || string.includes('!') == true || string.includes('@') == true || string.includes('#') == true || 
        string.includes('$') == true || string.includes('%') == true || string.includes('^') == true || string.includes('&') == true || 
        string.includes('*') == true || string.includes('(') == true || string.includes(')') == true || string.includes('<') == true || 
        string.includes('>') == true || string.includes('?') == true  || string.includes('/') == true || string.includes(',') == true || string.includes('.') == true
        || string.includes('"') == true  || string.includes('\'') == true  || string.includes(';') == true || string.includes(':') == true || string.includes('[') == true || string.includes(']') == true
        || string.includes('{') == true || string.includes('}') == true || string.includes('-') == true || string.includes('_') == true || string.includes('+') == true || string.includes('=') == true || string.includes('`') == true
        || string.includes('\\') == true || string.includes('|') == true || string.includes('a') == true || string.includes('b') == true || string.includes('c') == true
        || string.includes('d') == true || string.includes('e') == true || string.includes('f') == true || string.includes('g') == true
        || string.includes('h') == true || string.includes('i') == true || string.includes('j') == true || string.includes('k') == true
        || string.includes('l') == true || string.includes('m') == true || string.includes('n') == true || string.includes('o') == true
        || string.includes('p') == true || string.includes('q') == true || string.includes('r') == true || string.includes('s') == true || string.includes('t') == true
        || string.includes('u') == true || string.includes('v') == true || string.includes('w') == true || string.includes('x') == true || string.includes('y') == true
        || string.includes('z') == true || string.includes('A') == true || string.includes('B') == true || string.includes('C') == true
        || string.includes('D') == true || string.includes('E') == true || string.includes('F') == true || string.includes('G') == true
        || string.includes('H') == true || string.includes('I') == true || string.includes('J') == true || string.includes('K') == true
        || string.includes('L') == true || string.includes('M') == true || string.includes('N') == true || string.includes('O') == true
        || string.includes('P') == true || string.includes('Q') == true || string.includes('R') == true || string.includes('S') == true || string.includes('T') == true
        || string.includes('U') == true || string.includes('V') == true || string.includes('W') == true || string.includes('X') == true || string.includes('Y') == true
        || string.includes('Z') == true) {
            return false;
        }else{
            if (string.length != 11) {
                return false;
            }else{
                return true;
            }
        }
    },
    email_val : (email)=>{
        if (email.includes('@') == false || email.includes('.') == false) {
            return false;
        }else{
            if(email.includes('@.') == true){
                return false;
            }else{
                return true;
            }
        }
    },
    pass_val : (pass)=>{
        if (pass.length < 8) {
            return false;
        }else{
            if (val_algorithm(pass) == false) {
                return false;
            }else{
                return true;
            }
        }
    }
}
