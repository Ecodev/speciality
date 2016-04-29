######################
# module configuration
######################

mod.SHARED {
  defaultLanguageFlag = gb
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
  mod.wizards.newContentElement.wizardItems.Bootstrap.show = speciality_Alert_html, speciality_Accordion_html, speciality_ImageGallery_html, speciality_Carousel_html, speciality_SimpleResponsiveImage_html

[global]

# Disable "QuickEdit" menu in module "page".
mod.web_layout.menu.function {
  0 = 0
}