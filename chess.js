function addChess() {
  const chess = document.querySelector('#chess');
  let square;
  let flag = true;

  const board = {
    0 : ['&#9820', '&#9822', '&#9821', '&#9819', '&#9818', '&#9821', '&#9822', '&#9820'],
    1 : ['&#9823', '&#9823', '&#9823', '&#9823', '&#9823', '&#9823', '&#9823', '&#9823'],
    6 : ['&#9817', '&#9817', '&#9817', '&#9817', '&#9817', '&#9817', '&#9817', '&#9817'],
    7 : ['&#9814', '&#9816', '&#9815', '&#9813', '&#9812', '&#9815', '&#9816', '&#9814'],
  };

  for (let i = 0; i<8; i++) {
    for (let j = 0; j<8; j++) {
      if(j==0) flag = !flag;

      square = document.createElement('div');

      if (flag) square.className = 'block black';
      else square.className = 'block white';

      if(board[i]!=undefined && board[i][j]!==undefined) {
        square.innerHTML = board[i][j];
      }

      chess.appendChild(square);
      flag = !flag;
    }
  }
}

document.addEventListener('click', function (square) {
  square.target.classList.add('red');
});

addChess();