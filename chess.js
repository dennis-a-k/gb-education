const figurs = {
  black: {
      king: '&#9818',
      rook: '&#9820',
      bishop: '&#9821',
      queen: '&#9819',
      knight: '&#9822',
      pawn: '&#9823',

  },
  white: {
      king: '&#9812',
      rook: '&#9814',
      bishop: '&#9815',
      queen: '&#9813',
      knight: '&#9816',
      pawn: '&#9817',
  }
};

const board = [
  {color: 'light', figure: figurs.black.rook, active: false}, {color: 'dark', figure: figurs.black.knight, active: false}, {color: 'light', figure: figurs.black.bishop, active: false}, {color: 'dark', figure: figurs.black.queen, active: false}, {color: 'light', figure: figurs.black.king, active: false}, {color: 'dark', figure: figurs.black.bishop, active: false}, {color: 'light', figure: figurs.black.knight, active: false}, {color: 'dark', figure: figurs.black.rook, active: false},
  {color: 'dark', figure: figurs.black.pawn, active: false}, {color: 'light', figure: figurs.black.pawn, active: false}, {color: 'dark', figure: figurs.black.pawn, active: false}, {color: 'light', figure: figurs.black.pawn, active: false}, {color: 'dark', figure: figurs.black.pawn, active: false}, {color: 'light', figure: figurs.black.pawn, active: false}, {color: 'dark', figure: figurs.black.pawn, active: false}, {color: 'light', figure: figurs.black.pawn, active: false},
  {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false},
  {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false},
  {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false},
  {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false}, {color: 'dark', figure: null, active: false}, {color: 'light', figure: null, active: false},
  {color: 'light', figure: figurs.white.pawn, active: false}, {color: 'dark', figure: figurs.white.pawn, active: false}, {color: 'light', figure: figurs.white.pawn, active: false}, {color: 'dark', figure: figurs.white.pawn, active: false}, {color: 'light', figure: figurs.white.pawn, active: false}, {color: 'dark', figure: figurs.white.pawn, active: false}, {color: 'light', figure: figurs.white.pawn, active: false}, {color: 'dark', figure: figurs.white.pawn, active: false},
  {color: 'dark', figure: figurs.white.rook, active: false}, {color: 'light', figure: figurs.white.knight, active: false}, {color: 'dark', figure: figurs.white.bishop, active: false}, {color: 'light', figure: figurs.white.queen, active: false}, {color: 'dark', figure: figurs.white.king, active: false}, {color: 'light', figure: figurs.white.bishop, active: false}, {color: 'dark', figure: figurs.white.knight, active: false}, {color: 'light', figure: figurs.white.rook, active: false},
];

function getChessBoard() {

  board.forEach(function(item, index) {
    const options = {
      ...item,
      index: index,
    }
    addSquares(options);
  });
}

function addSquares(options) {
  const {
    color,
    figure,
    index,
    active
  } = options;

  const chess = document.querySelector('#chess');
  const square = document.createElement('div');

  square.classList.add('square');
  square.addEventListener('click', () => eventMove(index));

  if (figure) square.innerHTML = figure;
  if (color) square.classList.add(color);
  if (active) square.classList.add('active');

  chess.append(square);
}

function eventMove(index) {

  let currentActiveIndex;
  
  const isActiveCell = board.filter(function(item, indexActiveSquare) {
    if (item.active) currentActiveIndex = indexActiveSquare;
    return item.active;
  });

  if (!isActiveCell[0] && board[index].figure) {
    board[index].active = true;
  };

  if (isActiveCell[0]) {
    board[index].figure = board[currentActiveIndex].figure;
    board[currentActiveIndex].figure = null;
    board[currentActiveIndex].active = false;
  };

  redrawBoard();
};

function redrawBoard() {
  let chess = document.querySelector('#chess');
  chess.innerHTML = '';
  getChessBoard();
}
getChessBoard();