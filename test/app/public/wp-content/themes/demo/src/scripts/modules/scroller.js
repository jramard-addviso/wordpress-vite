class Scroller {
  defaultBehavior = window.matchMedia(`(prefers-reduced-motion: reduce)`)
    .matches
    ? 'instant'
    : 'smooth'

  constructor(behavior, baseOffset) {
    this.behavior = behavior || this.defaultBehavior
    this.baseOffset = baseOffset || 0
  }

  scroll(target, additionalOffset = 0) {
    let targetEl
    if (typeof target === 'string') targetEl = document.querySelector(target)
    else targetEl = target
    if (!targetEl) return
    const offset = targetEl.offsetTop - (this.baseOffset + additionalOffset)
    window.scroll({
      top: offset,
      behavior: this.behavior,
    })
  }
}

export default Scroller
