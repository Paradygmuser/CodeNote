package enael.examen;

import java.util.Objects;
// une paletter, un vrac ou au tre EST UN materiel.
public abstract class Materiel implements Chargeable, Comparable<Materiel> {
	protected Double volume;
	protected int poid;
	protected String identifiant;
	
	@Override
	public Double getVolume() {
		// TODO Auto-generated method stub
		return volume;
	}
	@Override
	public int getPoid() {
		// TODO Auto-generated method stub
		return poid;
	}
	@Override
	public String getIdentifiant() {
		// TODO Auto-generated method stub
		return identifiant;
	}
	//le trie par default sera par identifiant
	@Override
	public int compareTo(Materiel o) {
		// TODO Auto-generated method stub
		return this.identifiant.compareTo(o.getIdentifiant());
	}
	@Override
	public int hashCode() {
		return Objects.hash(identifiant);
	}
	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Materiel other = (Materiel) obj;
		return Objects.equals(identifiant, other.identifiant);
	}
}
