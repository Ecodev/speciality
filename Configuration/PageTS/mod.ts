######################
# module configuration
######################

mod.SHARED {
  defaultLanguageFlag = gb.gif
  defaultLanguageLabel = English
}


# Re-organize tabs within the new Content Element wizard only for regular user.
[adminUser = 0]

  # no tabs as the list is fairly small.
  mod.wizards.newContentElement.renderMode = NoTabs

  # 1. common
  mod.wizards.newContentElement.wizardItems.common.show = text, image

  # 2. special
  mod.wizards.newContentElement.wizardItems.special.show >

  # 3. forms
  mod.wizards.newContentElement.wizardItems.forms.show >

  # 4. plugins
  mod.wizards.newContentElement.wizardItems.plugins.show >

  # 5. Bootstrap
  mod.wizards.newContentElement.wizardItems.Bootstrap.show = FluidBT_Fluidbootstraptheme_Alert_html, FluidBT_Fluidbootstraptheme_Accordion_html, FluidBT_Fluidbootstraptheme_ImageGallery_html, FluidBT_Fluidbootstraptheme_Carousel_html, FluidBT_Fluidbootstraptheme_SimpleResponsiveImage_html

[global]