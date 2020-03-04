var XmasGame = XmasGame || {};

XmasGame.GameOver = function() {};

XmasGame.GameOver.prototype = {
  create: function() {
    this.background = this.game.add.tileSprite(0, 0, this.game.width, this.game.height, "background");
    this.background.autoScroll(20, 0);
    this.game.add.sprite((this.game.width / 2) - 276, (this.game.height / 2) - 73, "game_over");
  },

  update: function() {
    if (this.game.input.activePointer.justPressed()) {
      this.state.start("MainMenu");
    }
  }
};
