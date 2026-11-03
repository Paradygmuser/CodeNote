package enael.examen;

import java.util.Comparator;

public class ChargablePoidComparator implements Comparator<Materiel> {

	@Override
	public int compare(Materiel o1, Materiel o2) {
		// TODO Auto-generated method stub
		if(o1.getPoid()==o2.getPoid()) {
			if(o1.getVolume().equals(o2.getVolume())) {
				return o1.getIdentifiant().compareTo(o2.getIdentifiant());				
			}
			else {
				return o1.getVolume().compareTo(o2.getVolume());
			}
		}
		else {
			return o1.getPoid()-o2.getPoid();
		}
	}

}
