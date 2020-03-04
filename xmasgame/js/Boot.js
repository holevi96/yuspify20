var XmasGame = XmasGame || {};

XmasGame.Boot = function(){};

XmasGame.Boot.prototype = {
  preload: function() {
    this.load.image("preloadbar", "assets/images/loading.gif")
  },
  create: function() {
    this.game.stage.backgroundColor = "#000000";
    this.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
    this.scale.pageAlignVertically = true;
    this.scale.pageAlignHorizontally = true;
    this.game.physics.startSystem(Phaser.Physics.ARCADE);
    this.state.start("Preload");
  }
};
