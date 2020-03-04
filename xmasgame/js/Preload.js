var XmasGame = XmasGame || {};

XmasGame.Preload = function() {};

XmasGame.Preload.prototype = {
  preload: function() {
    this.preloadBar = this.add.sprite(this.game.world.centerX, this.game.world.centerY, "preloadbar");
    this.preloadBar.anchor.setTo(0.5);
    this.preloadBar.scale.setTo(3);

    this.load.setPreloadSprite(this.preloadBar);

    this.load.image("sleigh", "assets/images/sleigh.png");
    this.load.image("house_bottom_0", "assets/images/house_bottom_0.png");
    this.load.image("house_bottom_1", "assets/images/house_bottom_1.png");
    this.load.image("house_bottom_2", "assets/images/house_bottom_2.png");
    this.load.image("house_top_0", "assets/images/house_top_0.png");
    this.load.image("house_top_1", "assets/images/house_top_1.png");
    this.load.image("house_top_2", "assets/images/house_top_2.png");
    this.load.image("house_bottom_lrg_0", "assets/images/house_bottom_lrg_0.png");
    this.load.image("house_bottom_lrg_1", "assets/images/house_bottom_lrg_1.png");
    this.load.image("house_bottom_lrg_2", "assets/images/house_bottom_lrg_2.png");
    this.load.image("house_top_lrg_0", "assets/images/house_top_lrg_0.png");
    this.load.image("house_top_lrg_1", "assets/images/house_top_lrg_1.png");
    this.load.image("house_top_lrg_2", "assets/images/house_top_lrg_2.png");
    this.load.image("gift_0", "assets/images/gift_0.png");
    this.load.image("gift_1", "assets/images/gift_1.png");
    this.load.image("gift_2", "assets/images/gift_2.png");
    this.load.image("gift_3", "assets/images/gift_3.png");
    this.load.image("gift_4", "assets/images/gift_4.png");
    this.load.image("gift_5", "assets/images/gift_5.png");
    this.load.image("gift_6", "assets/images/gift_6.png");
    this.load.image("gift_7", "assets/images/gift_7.png");
    this.load.image("kid_0", "assets/images/kid_0.png");
    this.load.image("kid_1", "assets/images/kid_1.png");
    this.load.image("kid_2", "assets/images/kid_2.png");
    this.load.image("kid_3", "assets/images/kid_3.png");
    this.load.image("cloud_0", "assets/images/cloud_0.png");
    this.load.image("cloud_1", "assets/images/cloud_1.png");
    this.load.image("cloud_2", "assets/images/cloud_2.png");
    this.load.image("background", "assets/images/background.png");
    this.load.image("recobox", "assets/images/recobox.png");
    this.load.image("start", "assets/images/start.png");
    this.load.image("game_over", "assets/images/game_over.png");

    this.load.spritesheet("noise", "assets/images/noise.png", 17, 17);
  },
  create: function() {
    this.state.start("MainMenu");
  }
};
